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

    </head>

    <body>
        <hr/>
        <div class="container">
            <div class="row row-cols-md-5 row-cols-1">
                <div class="col">
                    <h5>Contact Us For Free</h5>
                    <div class="contact row justify-content-center">
                        <ul>
                            <li>Skin Consultant</li>
                            <li>Product Consultant</li>
                            <li>Order</li>
                            <li>More Information</li>
                        </ul>
                    </div>    
                    <div class="row find-us" >
                        <button type="button" class="btn btn-2" onclick="window.location.href='wa.me/6281328367388'"><b>Whatsapp</b></button>
                    </div>
                </div>
                <div class="col">
                    <h5>Find Us on Our Socials</h5>
                    <div class="row find-us">
                        <button type="button" class="btn btn-2"><b>Youtube</b></button>
                    </div>

                    <div class="row find-us">
                        <button type="button" class="btn btn-2" onclick="window.location.href='instagram.com/ufi.indonesia'"><b>Instagram</b></button>
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