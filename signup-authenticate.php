<?php

ini_set('session.gc_maxlifetime', 300);

// Set the session cookie lifetime to match the session lifetime
session_set_cookie_params(300);
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get user input from the form
    $email = $_GET["Email"];
    $password = $_GET["Password"];
    $name = $_GET["Name"];
    $userid = $_GET["UserID"];

    // Validate email and password (you can add more validation as needed)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Connect to the database (replace with your database connection code)
        $conn = new mysqli("localhost", "root", "", "major");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the user already exists
        $stmt_check = $conn->prepare("SELECT user_id FROM user WHERE user_id = ?");
        $stmt_check->bind_param("s", $userid);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        // If the user already exists, display a JavaScript alert
        if ($result_check->num_rows > 0) {
            echo "<script>alert('User ID already exists. Please choose a different one.');</script>";
            $stmt_check->close();
            $conn->close();
            // Add a JavaScript redirection to go back to the signup page
            echo "<script>window.location.replace('signup.php');</script>";
            exit();
        }

        // Prepare the SQL statement to insert a new user
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt_insert = $conn->prepare("INSERT INTO user (user_id, user_name, user_email, user_password) VALUES (?, ?, ?, ?)");
        $stmt_insert->bind_param("ssss", $userid, $name, $email, $hashedPassword);
        $stmt_insert->execute();
        $stmt_insert->close();

        // Handle profile picture upload
        if (isset($_FILES['ProfilePic']) && $_FILES['ProfilePic']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($_FILES['ProfilePic']['name']);
            if (move_uploaded_file($_FILES['ProfilePic']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, insert file path into database
                $stmt_insert_image = $conn->prepare("INSERT INTO image (user_id, img) VALUES (?, ?)");
                $stmt_insert_image->bind_param("ss", $userid, $uploadFile);
                $stmt_insert_image->execute();
                $stmt_insert_image->close();
            } else {
                // Error uploading file
                echo "Error uploading file.";
            }
        }

        // Set session variables
        $_SESSION['user_id'] = $userid;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_image'] = isset($uploadFile) ? $uploadFile : 'default-profile-pic.jpg';

        // Redirect to index.php
        header("Location: index.php");
        exit();

        // Close the database connection
        $stmt_check->close();
        $conn->close();
    } else {
        // Invalid email address
        echo "Invalid email address";
    }
}
?>
