<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp - OpenVision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    }

    .login-container {
        width: 400px;
        margin: auto;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        font-size: 16px; 
    }
</style>

</head>
<body>
    <div class="login-container">
        <form action="signup-authenticate.php" class="needs-validation" method="GET" novalidate>
            <h2 class="text-center mb-4">New User</h2>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" name="Name" placeholder="Name" required>
                <div class="invalid-tooltip">Please enter your name.</div>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputUserID">UserID</label>
                <input type="text" class="form-control" id="inputUserID" name="UserID" placeholder="UserID" required>
                <div class="invalid-tooltip">Please enter your user ID.</div>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="Email" required>
                <div class="invalid-tooltip">Please enter a valid email address.</div>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="Password" placeholder="Password" required>
                <div class="invalid-tooltip">Please enter your password to continue.</div>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputProfilePic">Profile Picture</label>
                <input type="file" class="form-control" id="inputProfilePic" name="ProfilePic" accept="image/*">
                <div class="invalid-tooltip">Please select a profile picture.</div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkRemember">
                    <label class="form-check-label" for="checkRemember">Remember me</label>
                </div>
            </div>
            <div class = "text-center">
            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
            </div>
        </form>

        <!-- JavaScript for disabling form submissions if there are invalid fields -->
        <script>
            // Self-executing function
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </div>
</body>
</html>
