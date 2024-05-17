<?php
session_start();

// Function to process the image using Python script
function processImage($imageFileName, $textFileName) {
    $pythonScript = "yolo.py";
    $command = "python $pythonScript $imageFileName $textFileName";

    // Execute the Python script
    shell_exec($command);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileUpload"])) {
    // Get the uploaded file details
    $fileName = $_FILES["fileUpload"]["name"];
    $tempFilePath = $_FILES["fileUpload"]["tmp_name"];

    // Save the image file
    $imageFilePath = "uploads/$fileName";
    move_uploaded_file($tempFilePath, $imageFilePath);

    // Save the text file with the same name as the image
    $textFilePath = "uploads/" . pathinfo($fileName, PATHINFO_FILENAME) . ".txt";
    file_put_contents($textFilePath, "Objects detected:\n");

    // Process the image using Python
    processImage($imageFilePath, $textFilePath);

    // If user is logged in, set session variable and redirect to index.php
    if (isset($_SESSION['user_id'])) {
        $_SESSION['file'] = $imageFilePath;
        header("Location: index.php");
        exit();
    }
} else {
    echo "File not received";
}
