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
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="uploads\favicon-32x32.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        /* Removed unnecessary styles */
        .column {
            float: left;
            width: 25%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color: #474e5d;
            color: white;
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 50%;
                display: block;
            }
        }

        /* New styles for version-one class */
        .version-one {
            padding: 40px;
            text-align: center;
            color: black;
        }

        p.text {
            color: red;
            font-size: 18px;
            font-weight: bold;
        }

        .bg-dark{
            background-color:#333;
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
    <!-- Header with version-one class -->
    <h2 style="text-align:center" class="version-one">Our Team

        <p class="text" style="margin-top: 20px;">"Introducing the visionary team behind Object Detection System, a collective of dedicated minds 
            devoted to transforming digital surveillance. With a unified mission, we strive to provide cutting-edge 
            solutions ensuring security and efficiency. Our commitment lies in delivering state-of-the-art object detection 
            technology tailored to meet your evolving needs. Together, we pave the way for a safer and smarter 
            tomorrow in surveillance innovation."</p>
    </h2>

    <!-- Team members section -->
    <div class="row">
        
    <div class="column" style="margin-left: 400px">
            <div class="card">
                <img src="" alt="Sachin Lakra" style="width:100%">
                <div class="container">
                    <h2>Sachin Lakra</h2>
                    <p class="title">Frontend Developer</p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="" alt="Bhavya Goel" style="width:100%">
                <div class="container">
                    <h2>Bhavya Goel</h2>
                    <p class="title">Backend Developer</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="container-fluid bg-dark fixed-bottom" > 
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
</body>

</html>
