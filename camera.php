<!-- <?php
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

        else {$filename="Human Tech (1).png";}

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
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home- OpenVision</title>
    <link rel="icon" href="uploads\favicon-32x32.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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

<br><br>
<div class="container-md">
    <div class="row">
        <div class="col">
        <!-- <div class="text-center">
            <br>
            <img src="Human Tech (1).png" alt="Sample Image" style="width:400px; height: auto">
        </div> -->
        <div class="text-center">
            <br>
            <h1 class="text-center"> OpenVision Realtime Photo Object Detection </h1>
            <!-- <p class="text-dark" style="font-size:130%; ">OpenVision, an advanced image detection system, seamlessly analyzes visuals, empowering users with precise insights and intelligent object recognition</P> -->
        </div>        
        </div>
    </div>
</div>

<br><br><br><br><br><br>
<div class="container mt-5">
    <div class="row g-3">
        <!-- CAMERA FUNCTIONS START HERE -->
        <div class="col-md-6">
            <h2><i class="bi bi-camera-fill"></i> Start Camera </h2><br>
            <video id="video" width="500" autoplay></video>
            <button id="capture" class="btn btn-dark">Capture Image</button>
            <canvas id="canvas" width="640" height="280" style="display:none;"></canvas>
        </div>
        <!-- CAMERA FUNCTION END HERE -->
        
        <div class="col-md-6">
            <h2><i class="bi bi-card-image"></i> Captured Image </h2><br>
            <img id ="image" src="Human Tech (1).png" width="500" height="380">
            <!-- <canvas id="canvas" style="display:none;"></canvas>
            <form action="object.php" method="POST" enctype="multipart/form-data" novalidate >
                <input type="file" id="fileUpload" name="fileUpload" accept="image/*" onchange="displaySelectedImage(this)" style="display: none;" required> -->

                <!-- <div class="file-upload-container" onclick="document.getElementById('fileUpload').click()">
                    <img id="selectedImage" src="#" alt="Selected Image">
                    <p class="lead">Click here to select an image file</p>
                </div>
                <p id="selectedFileName" style="display: none;"></p> -->
                <!-- <button type="submit" class="btn bg-dark mt-3 text-light">Upload to Server</button>
            </form> -->


            <!-- <p class="text-dark" style="font-size:120%;">OpenVision employs smart algorithms for precise object recognition through deep learning, streamlining image analysis effortlessly</p> -->
        </div>
    </div>
</div>
<br><br>
<!-- Footer -->
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

<!-- JAVASCRIPT FOR CAMERA HANDELING -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
      const video = document.getElementById('video');
      const canvas = document.getElementById('canvas');
      const captureButton = document.getElementById('capture');

      navigator.mediaDevices.getUserMedia({ video: true })
        .then((stream) => {
          video.srcObject = stream;
        })
        .catch((error) => {
          console.error('Error accessing webcam:', error);
        });

      captureButton.addEventListener('click', function () {
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        
        // Convert canvas content to JPEG image3
        const imageData = canvas.toDataURL('image/jpeg');

        // Send the image data to the server using XMLHttpRequest

        // Image in
        
        var img = document.getElementById("image");
        img.src=imageData;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'object2.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var responseData = JSON.parse(xhr.responseText);

            // Access the data sent back from the server
            console.log(responseData);
            // Store the image path in a variable
            var imagePath = responseData.imagePath;
            var textPath = responseData.textPath;
            var imageElement = document.getElementById("image");

            var imagePath = responseData.imagePath;
            var imageElement = document.getElementById("image");

            imageElement.src = imagePath;
            

            console.log('Image sent successfully');
          }
        };
        
        // Assuming you want to send the image data as 'image' parameter
        xhr.send('image=' + encodeURIComponent(imageData));
      });
    });
  </script>
</body>
</html>
