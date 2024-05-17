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
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="uploads\favicon-32x32.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Page title -->
    <title>Contact us Page</title>
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
    <!-- Banner section -->
    <section class="banner">
        <!-- Banner image -->
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20230822131732/images.png"
            alt="Welcome to our Contact Us page">
    </section>

    <!-- Company contact info section -->
    <section class="contact-info">
        <address>
            <!-- Company address and contact details -->
            Open Vision<br>
            123, South Delhi<br>
            Delhi, State Zip Code<br>
            Phone: <a href="tel:1234567890">1800-125-4569</a><br>
            Email: <a href="mailto:info@example.com">Contactus@objectdetection.com</a>
        </address>
    </section>

    <!-- Script tag for linking external JavaScript file -->
    <script src="script.js"></script>
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
    </div>
</body>

</html>

<!-- Internal Stylesheet -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }

    /* Banner section styles */
    .banner {
        text-align: center;
        background-color: #ffffff;
        margin: 0 auto;
    }

    .banner img {
        max-width: 100%;
        height: auto;
    }

    /* Contact info styles */
    .contact-info {
        text-align: center;
        padding: 50px 0;
        background-color: #f7f7f7;
    }

    .contact-info h2 {
        margin-bottom: 20px;
    }

    /* Media queries for responsiveness */
    @media only screen and (max-width: 768px) {
        .logo {
            display: none;
        }

        .hamburger {
            display: flex;
        }

        #nav-menu {
            position: absolute;
            top: 4rem;
            left: 0;
            background-color: #333;
            width: 100%;
            display: none;
        }

        #nav-menu.active {
            display: block;
            flex-direction: row;
            padding: 1rem;
        }
    }

    .bg-dark{
            background-color:#333;
        }
</style>

<!-- Internal JavaScript -->
<script>
    // JavaScript function to toggle the navigation menu
    function openNavbar() {
        const navMenu = document.getElementById("nav-menu");
        navMenu.classList.toggle("active");
    }
</script>
