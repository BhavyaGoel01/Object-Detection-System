<?php
// Start or resume the session
session_start();

// Check if the session is started
if (session_status() == PHP_SESSION_ACTIVE) {
    // Session is started, fetch variables
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $userName = $_SESSION['user_name'];
        $userEmail = $_SESSION['user_email'];

        if(isset($_SESSION['file'])){
            $filename=$_SESSION['file'];
            unset($_SESSION['file']);       
        }

        else {
            $filename="Human Tech (1).png";
        }

        // Use the session variables as needed
        // echo "User ID: $userId, Name: $userName, Email: $userEmail";
    } 
    else {
        // Redirect to login.php if session variables are not set
        header("Location: login.php");
        exit();
    }
} else {
    // Redirect to login.php if the session is not started
    header("Location: login.php");
    // exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home- OpenVision</title>
    <link rel="icon" href="uploads\favicon-32x32.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        .file-upload-container {
            border: 2px dashed #ccc;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            height: 300px;
            position: relative;
        }

        #fileUpload {
            display: none;
        }

        #selectedImage {
            max-width: 100%;
            max-height: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }

        .bg-dark{
            background-color: #333;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="#" class="navbar-brand ms-4">OpenVision</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto">
                <a href="index.php" class="nav-item nav-link active ms-3"><i class="bi bi-house-fill"></i> Home</a>
                <a href="aboutus.php" class="nav-item nav-link active ms-4"><i class="bi bi-info-circle-fill me-1"></i>About Us</a>
                <a href="contactus.php" class="nav-item nav-link active ms-4"><i class="bi bi-telephone-fill"></i> Contact Us</a>
            </div>
            <div class="navbar-nav ms-auto me-4">
                <a href="profile.php" class="nav-item nav-link active"><i class="bi bi-person-circle me-2"></i> <?php echo $_SESSION['user_id'];?></a>
            </div>
        </div>
    </div>
</nav>

<br><br><br>
<div class="container-md">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <br>
                <h1 class="text-center"> OpenVision Image Object Detection </h1>
            </div>
        </div>
    </div>
</div>

<br><br><br>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6">
            <h2><i class="bi bi-cloud-arrow-up-fill"></i> Upload Image</h2><br>
            <div class="file-upload-container" onclick="document.getElementById('fileUpload').click()">
                <img id="selectedImage" src="#" alt="Selected Image">
                <p class="lead">Click here to select an image file</p>
                <input type="file" id="fileUpload" name="fileUpload" accept="image/*" onchange="displaySelectedImage(this)" style="display: none;" required>
            </div>
            <p id="selectedFileName" style="display: none;"></p>
            <button type="button" class="btn bg-dark mt-3 text-light" onclick="uploadToServer()">Upload to Server</button>
        </div>

        <div class="col-md-6">
            <h2><i class="bi bi-cloud-arrow-down-fill"></i> Download Image</h2><br>
            <div class="text-center">
                <img src="<?php echo $filename;?>" id="default" class="border-bottom" alt="Sample Image" style="width:480px; height:300px"><br>  <br> 
                <div class="text-start">
                    <a href="<?php echo $filename;?>" download="filename.zip" class="btn btn-dark">Download File</a>               
                </div> 
            </div>
        </div>
    </div>
</div>

<br><br><br>
<!-- Footer -->
<div class="container-fluid bg-dark"> 
    <footer class="py-3 text-white">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0">Copyright © 2024 OpenVision</p>
                </div>
                <div class="col-6 text-md-end">
                    <a href="#" class="text-light" style="text-decoration: none;">Terms of Use</a>
                    <span class="text-muted mx-2">|</span>
                    <a href="#" class="text-light" style="text-decoration: none;">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    function displaySelectedImage(input) {
        const fileInput = input;
        const fileDisplay = document.getElementById('selectedImage');
        const fileNameDisplay = document.getElementById('selectedFileName');

        const file = fileInput.files[0];
        const fileName = file.name;

        const reader = new FileReader();
        reader.onload = function (e) {
            fileDisplay.src = e.target.result;
            fileDisplay.style.display = 'block';
            fileNameDisplay.innerText = `Selected File: ${fileName}`;
            fileNameDisplay.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }

    function uploadToServer() {
        const fileInput = document.getElementById('fileUpload');
        const file = fileInput.files[0];

        if (file) {
            const formData = new FormData();
            formData.append('fileUpload', file);

            fetch('object3.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                var imageElement = document.getElementById("default");
                var imagePath = data.imagePath;
                imageElement.src = imagePath;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            console.error('No file selected.');
        }
    }
</script>

</body>
</html>
