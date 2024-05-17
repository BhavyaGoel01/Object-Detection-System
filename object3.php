<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process data received from the client

    // Check if a file is uploaded
    if (isset($_FILES["fileUpload"]) && $_FILES["fileUpload"]["error"] == UPLOAD_ERR_OK) {
        // Get details of the uploaded file
        $fileName = $_FILES["fileUpload"]["name"];
        $tempFilePath = $_FILES["fileUpload"]["tmp_name"];

        // Save the image file to the uploads directory
        $imageFilePath = "uploads/" . $fileName;
        move_uploaded_file($tempFilePath, $imageFilePath);

        // Create a text file with the same name as the image for object detection results
        $textFilePath = "uploads/" . pathinfo($fileName, PATHINFO_FILENAME) . ".txt";
        file_put_contents($textFilePath, "Objects detected:\n");

        // Call the Python script for object detection
        $pythonScript = "yolo.py";
        $command = "python $pythonScript $imageFilePath $textFilePath";
        shell_exec($command);

        // Prepare response data
        $responseData = [
            'message' => 'Data received and processed successfully.',
            'imagePath' => $imageFilePath
            // You can add more data to the response as needed
        ];

        // Send a response back to the client as JSON
        header('Content-Type: application/json');
        echo json_encode($responseData);
    } else {
        // Handle errors in file upload
        echo "Error uploading file.";
    }
}
?>
