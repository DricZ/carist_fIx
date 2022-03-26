<?php
        require_once 'include.php';
        require_once 'header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UFI</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="./css/style.css" rel="stylesheet">

        <style>
            html,body {
                height: 100%;
            }
        </style>
    </head>

    <body>
        <hr/>
        <div class="container">
            <div class="row row-cols-md-5 row-cols-1">
                <div class="col">
                    <h5 style="margin-bottom: 20px;">Contact Us For Free</h5>
                    <div class="contact row justify-content-center">
                        <ul>
                            <li>Skin Consultant</li>
                            <li>Product Consultant</li>
                            <li>Order</li>
                            <li>More Information</li>
                        </ul>
                    </div>    
                </div>
                <div class="col find-us d-index" style="margin-left: 5vw;">
                    <a onclick="window.location.href='https://wa.me/6281328367388'"><img src="./img/wa.png" style="width: 170%;
    margin: -8vw; margin-bottom: -18vw;"></a>
                </div>

                <div class="col center m-index" style="height: 25vh; display: flex;">
                    <a onclick="window.location.href='https://wa.me/6281328367388'"><img src="./img/wa.png" style="width: 100%;"></a>
                </div>

                <div class="col">
                    <h5 style="margin-bottom: 20px;">Find Us on Our Socials</h5>
                    <!-- <div class="row find-us">
                        <button type="button" class="btn btn-2" onclick="window.location.href='https://www.instagram.com/ufi.indonesia/'"><b>Youtube</b></button>
                    </div> -->

                    <div class="row find-us d-index">
                        <button type="button" class="btn btn-2" onclick="window.location.href='https://www.instagram.com/ufi.indonesia/'"><b>Instagram</b></button>
                    </div>

                    <div class="row find-us center m-index" style="display:flex">
                        <button type="button" class="btn btn-2" onclick="window.location.href='https://www.instagram.com/ufi.indonesia/'"><b>Instagram</b></button>
                    </div>

                    
                </div>

                
            </div>
        </div>
    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>