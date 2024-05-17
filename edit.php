<?php
session_start();

// Redirect to login.php if the session is not started
if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch session variables
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$userEmail = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>openVision - edit details</title>
    <link rel="icon" href="uploads/favicon-32x32.png" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form id="loginForm" class="needs-validation" novalidate>
            <h2>Edit details</h2>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputUsername">Name</label>
                <input type="text" class="form-control" id="inputUsername" name="Name" placeholder="Username" value="<?= $userName ?>" required>
                <div class="invalid-tooltip">Please enter a valid username.</div>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="Email" value="<?= $userEmail ?>" required>
                <div class="invalid-tooltip">Please enter a valid email address.</div>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="Password" placeholder="Password" required>
                <div class="invalid-tooltip">Please enter your password to continue.</div>
            </div>
            <button type="button" onclick="submitForm()" class="btn btn-primary btn-block">Save</button>
        </form>

        <!-- JavaScript for handling form submission with XMLHttpRequest and simple validation -->
        <script>
            function submitForm() {
                var form = document.getElementById('loginForm');
                var username = document.getElementById('inputUsername').value;
                var email = document.getElementById('inputEmail').value;
                var password = document.getElementById('inputPassword').value;

                if (username.trim() === '' || !validateEmail(email) || password.trim() === '') {
                    // Simple validation failed, display an error message
                    alert('Please fill in all the fields with valid information.');
                } else {
                    // Form is valid, proceed with submission
                    var formData = new FormData(form);
                    var xhr = new XMLHttpRequest();

                    xhr.open('POST', 'edit-server.php', true);
                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 300) {
                            // Success, handle the response
                            var response = JSON.parse(xhr.responseText); // Parse JSON response
                            if (response.message === "done") { // Check if message is "done"
                                alert("Details updated successfully."); // Show success message
                            } else {
                                alert("Failed to update details."); // Show failure message
                            }
                        } else {
                            // Error, handle the error
                            console.error(xhr.statusText);
                        }
                    };
                    xhr.send(formData);
                }
            }

            function validateEmail(email) {
                // Simple email validation
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
        </script>
    </div>
</body>
</html>
