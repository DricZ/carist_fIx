<?php
        require_once 'include.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UFI</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <style>
            .container{
                padding: 50px;
            }

            hr{
                border: 0.8px;
                color: #818FEC;
            }

            /* HEADER */
            .header{
               z-index: 1; 
            }

            .logo{
                position: relative;
            }

            .logo.kiri{
                width: 9vw;
                margin: 30px;
                left: 50%;
            }

            .logo.tengah{
                width: 35vw;
                margin: 15px;
                margin-top: 10px;
            }

            .nav{
                margin: -25px;
                padding-bottom: 60px;
            }

            .nav-color{
                color: #818FEC;
            }
            
            .nav-hd{
                margin-left: 10px;
                margin-right: 10px;
            }

        </style>
    </head>

    <body>
        <div class="container-fluid header">

            <!-- HEADER -->
            <div class="row">
                
                <!-- LOGO -->
                <div class="col-sm-2">
                    <img class="logo kiri" src="./img/logo UFI.png" alt="PT. United Farmatic Indonesia">
                </div>
                
                <!-- HOME PRODUCT DLL -->
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <img class="logo tengah" src="./img/Nama PT.png" alt="PT. United Farmatic Indonesia">
                            </center>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="nav justify-content-center">
                                <li class="nav-item nav-hd">
                                    <a class="nav-link" href="index.php"><b class="nav-color">HOME</b></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav-hd" href="#"><b class="nav-color">PRODUCT</b></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav-hd" href="about_us.php"><b class="nav-color">ABOUT US</b></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav-hd" href="news.php"><b class="nav-color">NEWS</b></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav-hd" href="career.php"><b class="nav-color">CAREER</b></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav-hd" href="contact_us.php"><b class="nav-color">CONTACT US</b></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                
                </div>
            </div>
        </div>
    </body>
</html>