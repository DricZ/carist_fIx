
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carist Admin - Login</title>

    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height:100vh;
            font-family: 'Jost', sans-serif;
            background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
        }

        .main{
            width: 350px;
            height: 500px;
            /* background: red; */
            overflow: hidden;
            background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);

            border-radius: 10px;
            box-shadow: 5px 20px 50px #000
        }

        #chk{
            display:none;
        }

        .login{
            position: relative;
            width: 100%;
            height: 100%;
        }

        label{
            color: white;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }

        input{
            width: 60%;
            height: 20px;
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }

        button{
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #573b8a;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            border: none;
            outline: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }

        button:hover{
            background: #6d44b8;
        }

        .signup{
            height: 460px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;
        }

        .signup label{
            color: #573b8a;
            transform: scale(.6);
        }

        #chk:checked ~ .signup{
            transform: translateY(-500px);
        }

        #chk:checked ~ .signup label{
            transform: scale(1);
        }

        #chk:checked ~ .login label{
            transform: translateY(-45px) scale(0.8);
        }

        /* .login_oueter {
            width: 360px;
            max-width: 100%;
        }
        .logo_outer{
            text-align: center;
        }
        .logo_outer img{
            width:120px;
            margin-bottom: 40px;
        } */
    </style>

</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

            <div class="login">
                <form method="post" action="sys/check_login.php">
                    <label for="chk" aria-hidden="true"><img src="./img/carist only cropped.png" style="width: 40%;"></label>
                    <input type="text" name="username" placeholder="Username" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button>Login</button>
                </form>
            </div>
            
            <div class="signup">
                <form>
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="username" placeholder="Username" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button>Sign up</button>
                </form>
            </div>
    </div>
</body>

<!-- <body style="background-color: #34c0b2">

    <button onclick="window.location.href = '.././'" class="btn btn-primary position-absolute" style="top: 30px; left: 30px; border-radius: 100%; width: 60px; height: 60px"><img src="./img/back.svg" style="width: 15px;"></button>

    <div class="container" style="height: 100vh;
    align-items: center;
    display: flex;
    justify-content: center;">

        <div class="row justify-content-center" style="width: 100%;">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <?php
                                            // if(isset($_GET["wrong"])){
                                            //     echo "<div class='text-danger'>Wrong Password! Please try again!</div><br>";
                                            // }
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
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body> -->

<!-- <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/sb-admin-2.min.js"></script> -->

<script>
    // function password_show_hide() {
    //     var x = document.getElementById("password");
    //     var show_eye = document.getElementById("show_eye");
    //     var hide_eye = document.getElementById("hide_eye");
    //     show_eye.classList.remove("d-none");
    //     if (x.type === "password") {
    //         x.type = "text";
    //         hide_eye.style.display = "none";
    //         show_eye.style.display = "block";
    //     } else {
    //         x.type = "password";
    //         hide_eye.style.display = "block";
    //         show_eye.style.display = "none";
    //     }
    // }
</script>


</html>