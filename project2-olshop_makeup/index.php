<?php
    //header("Location: ./coming-soon/");
    require_once 'include.php';
    require_once 'header.php';
    require "admin/sys/connect.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UFI</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="./css/style.css" rel="stylesheet">

    </head>

    <!-- DESKTOP VIEW -->
    <body>
        <div class="container-fluid banner1 ">
        </div>

        <div class="container pb-1 text-center ">
            <h3 class="ub"><b>OUR BRANDS</b></h3>
            <div class="row">
                <div class="col-3 text-center">
                    <span class="helper"></span><img class="logo-footer-a" src="./img/Alfacid.png">
                </div>
                <div class="col-3 text-center">
                    <span class="helper"></span><img class="logo-footer-a" src="./img/SolaSense.png">
                </div>
                <div class="col-3 text-center">
                    <span class="helper"></span><img class="logo-footer-a" src="./img/logo primaderma.png">
                </div>
                <div class="col-3 text-center">
                    <span class="helper"></span><img class="logo-footer-a" src="./img/Hydrosnail.png">
                </div>
            </div>

            <div class="row mb-5" style="margin-top: 70px;">
                <div class="col-4 text-center">
                    <span class="helper"></span><img class="logo-footer-b1" src="./img/Kaneira.png">
                </div>

                <div class="col-4 text-center">
                    <span class="helper"></span><img class="logo-footer-b2" src="./img/Beaulash Logo-02.png">
                </div>

                <div class="col-4 text-center">
                    <span class="helper"></span><img class="logo-footer-b3" src="./img/Skinesse.png">
                </div>
            </div>
        </div>

        <hr class=""/>

        <div id="banner" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#banner" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#banner" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#banner" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container text-left b1">
                        <!-- <button type="button" class="button-active shop btn-br" value="SHOP" onclick="">SHOP</button> -->
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="container text-left b2">
                    </div>                        
                </div>

                <div class="carousel-item">
                    <div class="container text-left b3">
                    </div>                        
                </div>

                <div class="carousel-item">
                    <div class="container text-left b3">
                    </div>                        
                </div>
            </div>
        </div>

        <hr class=""/>

        <!-- PRODUCTS -->
        <div class="container product ">
            <div class="row products-text">
                <center><h2 class="judul"><b>Products</b></h2></center>
            </div>

            <div class="row">
                <!-- Carousel -->
                <div id="products" class="carousel slide" data-bs-ride="carousel">

                <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row" style="justify-content: center;">
                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Wash.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p d-index" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Pro Peel 20.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row" style="justify-content: center;">
                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Wash.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p d-index" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Pro Peel 20.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row" style="justify-content: center;">
                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Wash.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p d-index" style="border: 0">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Pro Peel 20.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev pct-l" type="button" data-bs-target="#products" data-bs-slide="prev" style="margin: 20px">
                    <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next pct-r" type="button" data-bs-target="#products" data-bs-slide="next" style="margin: 20px">
                    <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <div class="row">
                <center>
                    <button type="button" class="button-active btn-2" value="SHOP" onclick="" style="margin: 50px;"><b>VIEW ALL PRODUCTS</b></button>

                </center>
            </div>
            
        </div>

        <hr class=""/>

        <!-- SOSIALS -->
        <div class="container isi ">
            <div class="row products-text" style="padding: 20px">
                <center ><h2 class="judul"><b>SOCIALS</b></h2></center>
            </div>

            <div 
            loading="lazy"
            data-mc-src="131f7f8b-4572-46ef-b523-847b4d662a37#instagram"></div>

            <!-- <center>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card ig">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card ig">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card ig">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>
            </div>    
            </center> -->
        </div>

        <hr class=""/>

        <!-- NEWS -->
        <div class="container news d-index">
            <div class="row products-text" style="padding: 20px">
                <center ><h2 class="judul"><b>News</b></h2></center>
            </div>

            <?php
                $sql = "SELECT * FROM news";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $img = "img/news/".$row['img'];
                        $wrap_limit = 300;
                        $news = $row['news'];
                        $news = strlen($news) > $wrap_limit ? substr($news,0,$wrap_limit)."..." : $news;
                        $upload_date = $row['upload_date'];
                        $phpdate = strtotime($upload_date);
                        $date = date('l, d F Y', $phpdate);
            ?>

            <div class="card" style="margin-bottom: 20px; border: 0" onclick="buka(<?=$id?>)">
                <div class="row">
                    <div class="col-5">
                        <img src="<?=$img?>" alt="Fasilitas" style="width: 30vw; border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    </div>
                    <div class="col-7" style="padding: 25px; border-width: 2px; 
    border-top-right-radius: 35px;
    border-bottom-right-radius: 35px; 
    border-color: #2B388F;
    border-style:solid; 
    margin-left: -3vw !important;
    width: 60%;">
                        <h3 style="font-weight:600"><?=$title?></h3>                
                        <p style="font-weight:400"><?=$news?></b></p>
                        <p style="font-weight:600"><?=$date?></p>
                    </div>
                </div>    
            </div>
            
            <?php
                    }
                }
            ?>
            
        </div>

        <div class="container news m-index">
            <div class="row products-text" style="margin-bottom: 20px">
                <center ><p class="judul"><b>News</b></p></center>
            </div>

            <?php
                $sql = "SELECT * FROM news";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $img = "img/news/".$row['img'];
                        $wrap_limit = 300;
                        $news = $row['news'];
                        $news = strlen($news) > $wrap_limit ? substr($news,0,$wrap_limit)."..." : $news;
                        $upload_date = $row['upload_date'];
                        $phpdate = strtotime($upload_date);
                        $date = date('l, d F Y', $phpdate);
            ?>

            <div class="card" style="" onclick="buka(<?=$id?>)">
                <div class="row">
                    <div class="col-4">
                        <img src="<?=$img?>" alt="Fasilitas" style="width: 25vw; height: 15vh; border-top-left-radius: 30px; border-bottom-left-radius: 30px;">
                    </div>
                    <div class="col-8" style="padding: 20px">
                        <p style="font-size: 6px"><b><?=$title?></b></p><br>             
                        <p style="font-size: 4px"><?=$news?></b></p><br>
                        <p style="font-size: 4px"><?=$date?></p>
                    </div>
                </div>    
            </div>
            
            <?php
                    }
                }
            ?>
            
        </div>

        
    </body>

     <!-- API IG -->
     <script 
            src="https://cdn2.woxo.tech/a.js#623bd783fdafa80021c480e2" 
            async data-usrc>
    </script>

    <!-- NEWS -->
    <script>
        function buka(id){
            window.location.href = "news-detail.php?id=" + id;
        }
    </script>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>