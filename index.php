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
        } else {
            $filename="Human Tech (1).png";
        }

        // Use the session variables as needed
        // echo "User ID: $userId, Name: $userName, Email: $userEmail";
    } else {
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
    <title>Home - OpenVision</title>
    <link rel="icon" href="uploads\favicon-32x32.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
            background-color:#CCC;
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

<div class="container-md">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <br>
                <img src="<?php echo $filename; ?>" alt="Sample Image" style="width:400px; height: auto">
            </div>
            <div class="text-center">
                <br>
                <h1 class="text-center"> OpenVision Object Detection system </h1>
                <p class="text-dark" style="font-size:130%;">OpenVision, an advanced image detection system, seamlessly analyzes visuals, empowering users with precise insights and intelligent object recognition</p>
            </div>
        </div>
    </div>
</div>

<br><br><br>
<div class="container mt-5">
    <!-- ROW -->
    <div class="row g-3">
        <div class="col-md-6">
            <h2><i class="bi bi-question-square-fill"></i> What is OpenVision </h2><br>
            <p class="text-dark" style="font-size:120%;">OpenVision is a robust image detection system leveraging sophisticated algorithms for intelligent object recognition and analysis</p>
        </div>
        
        <div class="col-md-6">
            <h2><i class="bi bi-gear-fill"></i>  How it works ? </h2><br>
            <p class="text-dark" style="font-size:120%;">OpenVision employs smart algorithms for precise object recognition through deep learning, streamlining image analysis effortlessly</p>
        </div>
    </div>

    <!-- ROW -->
    <div class="row mt-5">
        <div class="col-md-6">
            <h2><i class="bi bi-cloud-arrow-up-fill"></i> Upload Image</h2><br>
            <p class="text-dark" style="font-size:120%;">Empowering users, our project enables image uploads, swiftly detecting and presenting identified objects, enhancing visual understanding effortlessly</p>
            <a href="photo.php" id="click"  class="btn btn-dark">Try it now</a>
        </div>
        <br><br><br><br>

        <div class="col-md-6">
            <h2><i class="bi bi-camera-fill"></i> Webcam image upload</h2><br>
            <p class="text-dark" style="font-size:120%;">Empowering users, our project enables image uploads, swiftly detecting and presenting identified objects, enhancing visual understanding effortlessly</p>
            <a href="camera.php" id="click"  class="btn btn-dark">Try it now</a>
        </div>
    </div>
</div>
<br><br><br>
<div class="container-fluid bg-dark" > 
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
</body>
</html>
