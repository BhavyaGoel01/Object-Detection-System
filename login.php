<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - OpenVision</title>
    <link rel="icon" href="uploads\favicon-32x32.png" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .login-container {
            width: 400px;
            margin: auto;
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        .login-heading {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: bold; /* Add bold font weight */
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-color: #ced4da;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="authenticate.php" class="needs-validation" enctype="multipart/form-data" method="GET" novalidate>
            <h2 class="login-heading">Login</h2>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputUserID">User ID</label>
                <input type="text" class="form-control" id="inputUserID" name="UserID" value="" placeholder="User ID" required>
                <div class="invalid-tooltip">Please enter a valid user ID.</div>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="Password" value="" placeholder="Password" required>
                <div class="invalid-tooltip">Please enter your password to continue.</div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkRemember" name="checkRemember">
                    <label class="form-check-label" for="checkRemember">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            <div class="mt-3 text-center">
                <a href="signup.php" class="btn btn-secondary">Sign Up</a>
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
