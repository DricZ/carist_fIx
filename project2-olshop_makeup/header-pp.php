<?php
        require_once 'include.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PT. United Farmatic Indonesia</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <style>
            .container{
                padding: 50px;
            }

            .mv{
                display: none;
                width: 100%;
                float: right;
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
                /* left: 50%; */
            }

            .logo.tengah{
                width: 35vw;
                margin: 15px;
                margin-top: 10px;
            }

            .nav-color{
                color: #818FEC;
            }
            
            .nav-hd{
                margin-left: 10px;
                margin-right: 10px;
            }

            .nav-mv{
                margin: 30px; 
                margin-left: 0;
                display: none;
            }

        </style>
    </head>

    <body>

            <!-- HEADER -->
        
        <!-- DESKTOP VIEW -->
        <nav class="navbar navbar-expand-sm justify-content-center divMobile">
            <div class="container-fluid header justify-content-center" style="background-color: white">

                <!-- HEADER -->
                <div class="row" style="width:100%">
                    <div class="col-sm-1 divMobile">
                    </div>
                    
                    <!-- LOGO -->
                    <div class="col-sm-2 divMobile">
                        <img class="logo kiri" src="./img/Logo_UFI.png" alt="PT. United Farmatic Indonesia">
                    </div>
                    
                    <!-- HOME PRODUCT DLL -->
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                    <center>
                                        <img class="logo tengah" src="./img/Nama PT.png" alt="PT. United Farmatic Indonesia" style="z-index: -1;">
                                        <img class="mobile" src="./img/Artboard 1 copy.png" alt="PT. United Farmatic Indonesia">
                                    </center>
                            </div>
                        </div>

                        <div class="row" style="margin-top: -30px">
                            <div class="col-sm-12" >
                                <div class="collapse navbar-collapse navbar-expand-sm justify-content-center">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" href="./"><b class="nav-color">HOME</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" style="margin-left: 20px" href="product.php"><b class="nav-color">PRODUCT</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" style="margin-left: 20px" href="about_us.php"><b class="nav-color">ABOUT US</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" style="margin-left: 20px" href="news.php"><b class="nav-color">NEWS</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" style="margin-left: 20px" href="career.php"><b class="nav-color">CAREER</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" href="contact_us.php"><b class="nav-color">CONTACT US</b></a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3" style="display:flex; align-items: end;">
                        <form method="GET" action="">
                            <div class="input-group">
                                <div id="navbar-search-autocomplete" class="form-outline" style="height: 0; width: 80%">
                                    <input type="search" name= "search" id="form1" class="form-control anu3" placeholder="Find products, series,...">
                                </div>
                                <button type="submit" class="btn btn-primary search-icon">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form> 
                    </div> 
                </div>
            </div>    
        </nav>

        <!-- MOBILE VIEW -->
        <nav class="navbar navbar-expand-lg navbar-light nav-mv">
            <div class="container-fluid">
                <div class="row">
                    <button style="    border: 0;
    width: 10%;
    padding: 0;
    margin-left: 10px;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style="width: 25px"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="width: 20%;
    padding: 0;"><img class="mv" src="./img/Logo_UFI.png" alt="PT. United Farmatic Indonesia"></a>

                    <div class="col-sm-3" style="display: flex;
                        align-items: center;
                        width: 60%;
                        padding: 0;
                        justify-content: center;">
                        <div class="input-group">
                            <div id="navbar-search-autocomplete" class="form-outline" style="height: 0; width: 80%">
                                <input type="search" id="form1" class="form-control anu3" placeholder="Find products, series,...">
                            </div>
                            <button type="button" class="btn btn-primary search-icon">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                        
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item nav-hd">
                                <a class="nav-link" href="index.php"><b class="nav-color">HOME</b></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-hd" href="product.php"><b class="nav-color">PRODUCT</b></a>
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
        </nav>
        

    </body>
</html>