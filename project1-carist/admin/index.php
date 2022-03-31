
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carist Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .login_oueter {
            width: 360px;
            max-width: 100%;
        }
        .logo_outer{
            text-align: center;
        }
        .logo_outer img{
            width:120px;
            margin-bottom: 40px;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container" style="height: 100vh;
    align-items: center;
    display: flex;
    justify-content: center;">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="width: 100%;">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <?php
                                            if(isset($_GET["wrong"])){
                                                echo "<div class='text-danger'>Wrong Password! Please try again!</div><br>";
                                            }
                                        ?>
                                    </div>
                                    <form class="user" method="post" action="sys/check_login.php">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                                <div class="input-group-append">
                                                    <input type="password" id="password" name="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" style="border-top-right-radius: 0; border-bottom-right-radius: 0; border-right: 0;">
                                                    <span class="input-group-text" onclick="password_show_hide();" style="border-top-left-radius: 0; border-top-right-radius: 25px; border-bottom-right-radius: 25px; border-bottom-left-radius: 0; border-left: 0; background-color: transparent;">
                                                        <i class="fas fa-eye d-none" id="show_eye"></i>
                                                        <i class="fas fa-eye-slash" id="hide_eye"></i>
                                                    </span>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <hr>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Sign In
                                        </button>
                                        <!-- <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!-- <hr>
                                    <div class="text-center">
                                        <a class="small" type="reset">Reset!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            show_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                hide_eye.style.display = "none";
                show_eye.style.display = "block";
            } else {
                x.type = "password";
                hide_eye.style.display = "block";
                show_eye.style.display = "none";
            }
        }
    </script>
</body>

</html>