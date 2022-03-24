<?php
        require_once 'include.php';
        require_once 'header.php';

        require "admin/sys/connect.php";
        $id = $_GET["id"];

        $sql = "SELECT * FROM news WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $title = $row['title'];
                $img = "img/news/".$row['img'];
                $wrap_limit = 500;
                $news = $row['news'];
                $upload_date = $row['upload_date'];
                $phpdate = strtotime($upload_date);
                $date = date('l, d F Y', $phpdate);
            }
        }
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
        <hr style="margin-bottom: 0;" />
        <div class="container-fluid megathronz-news" style="background-image: url('<?=$img?>'); ">   
        </div>
        <p><i style="margin: 20px; opacity: 0.8">Picture Credit/description</i></p>
        
        
        <div class="container">
            <center>
                <h2><b><?=$title?></b></h2><br>
                <!-- <h4><b>Subtitle Here: Put Here<b></h4><br><br>
                <p>
                    <b>By Admin</b><br>
                </p> -->
                <h5><b><?=$date?><b></h5><br><br>
            </center>

            <p style="text-align:justify; width: 50vw">
                <?=$news?>
            </p>
        </div>
        
        <hr/>

        <div class="container">
            <center>
                <h5><b>Read More</b></h5>
                
                <div class="row">

                    <!-- Carousel -->
                    <div id="products" class="carousel slide" data-bs-ride="carousel">

                    <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <div class="col-4 card p ">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>

                                    <div class="col-4 card p">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>

                                    <div class="col-4 card p">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <div class="col-4 card p ">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>

                                    <div class="col-4 card p">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>

                                    <div class="col-4 card p">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <div class="col-4 card p ">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>

                                    <div class="col-4 card p">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>

                                    <div class="col-4 card p">
                                        <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                        <center class="judul pr">Nama Produk</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <center>
                        <button type="button" class="button-active btn-2" value="SHOP" onclick="">VIEW ALL PRODUCTS</button>

                    </center>
                </div>
                
            </div>
            </center>
            
        </div>
        
    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>