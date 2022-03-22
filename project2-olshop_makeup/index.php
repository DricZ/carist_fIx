<?php
    //header("Location: ./coming-soon/");
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
        

        <!-- BANNER -->
        <!-- <div class="container banner">
            <div class="row"> -->
                <div id="banner" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#banner" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#banner" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#banner" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container text-left b1">
                                <button type="button" class="button-active shop btn-br" value="SHOP" onclick="">SHOP</button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container text-left b2">
                                <button type="button" class="button-active shop btn-br" value="SHOP" onclick="">SHOP</button>
                            </div>                        
                        </div>
                        <div class="carousel-item">
                            <div class="container text-left b3">
                                <button type="button" class="button-active shop btn-br" value="SHOP" onclick="">SHOP</button>
                            </div>                        
                        </div>
                        <div class="carousel-item">
                            <div class="container text-left b3">
                                <button type="button" class="button-active shop btn-br" value="SHOP" onclick="">SHOP</button>
                            </div>                        
                        </div>
                    </div>
                </div>
            <!-- </div>
        </div> -->

        <!-- CARD FASI & TEAM -->
        <div class="container team">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card ft card-bg1 c1">
                        <img class="card-img-top c-img" src="./img/QC_2.jpg" alt="Fasilitas">
                        <h2 class="card-text">FASILITAS<h2>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="card ft card-bg1 c2">
                        <img class="card-img-top c-img" src="./img/marketing 1.jpg" alt="Our Team">
                        <h2 class="card-text">OUR TEAM</h2>
                    </div>
                </div>
            </div>
        </div>

        <hr/>

        <!-- PRODUCTS -->
        <div class="container product">
            <div class="row products-text" style="padding: 20px">
                <center><h2 class="judul"><b>Products</b></h2></center>
            </div>

            <div class="row">
                <!-- Carousel -->
                <div id="products" class="carousel slide" data-bs-ride="carousel">

                <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="card p ">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Wash.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Pro Peel 20.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="card p ">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Wash.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Pro Peel 20.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="card p ">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Toner.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Face Wash.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>

                                <div class="card p">
                                    <img class="card-img-top product" src="./img/PRODUK/Alfacid Pro Peel 20.jpg" alt="Fasilitas">
                                    <center class="judul pr">Nama Produk</center>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev pct-l" type="button" data-bs-target="#products" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next pct-r" type="button" data-bs-target="#products" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <div class="row">
                <center>
                    <button type="button" class="button-active btn-2" value="SHOP" onclick="" style="margin: 50px;">VIEW ALL PRODUCTS</button>

                </center>
            </div>
            
        </div>

        <hr/>

        <!-- NEWS -->
        <div class="container news">
            <div class="row products-text" style="padding: 20px">
                <center ><h2 class="judul"><b>News</b></h2></center>
            </div>

            <div class="card c-news" style="border-radius: 35px; margin-bottom: 30px">
                <div class="row">
                    <div class="col-4">
                        <img src="./img/news.png" alt="Fasilitas" style="width: 20vw;
    height: 37vh; border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    </div>
                    <div class="col-8" style="padding: 25px">
                        <h2>News/Article Headline <br> SENSATIONAL </h2>                
                        <p>The song came from the bathroom belting over the sound of the shower's running water. It was the same way each day began since he could remember. It listened intently and concluded that the singing today was as terrible as it had ever been.</p>
                        <p>01 January 2022</p>
                    </div>
                </div>    
            </div>

            <div class="card c-new" style="border-radius: 35px; margin-bottom: 20px">
                <div class="row">
                    <div class="col-4">
                        <img src="./img/news.png" alt="Fasilitas" style="width: 20vw;
    height: 37vh; border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    </div>
                    <div class="col-8" style="padding: 25px">
                        <h2>News/Article Headline <br> SENSATIONAL </h2>                
                        <p>The song came from the bathroom belting over the sound of the shower's running water. It was the same way each day began since he could remember. It listened intently and concluded that the singing today was as terrible as it had ever been.</p>
                        <p>01 January 2022</p>
                    </div>
                </div>    
            </div>

            <div class="row">
                <center>
                    <button type="button" class="button-active btn-2" value="SHOP" onclick="" style="margin: 50px;">VIEW ALL NEWS</button>

                </center>
            </div>
            
        </div>

        <hr/>

        <!-- SOSIALS -->
        <div class="container isi">
            <div class="row products-text" style="padding: 20px">
                <center ><h2 class="judul"><b>SOCIALS</b></h2></center>
            </div>

            <center>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card" style="width: 20vw; margin: 20px;">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="width: 20vw; margin: 20px;">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="width: 20vw; margin: 20px;">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>
            </div>    

            <div class="row">
                <div class="col-sm-4">
                    <div class="card" style="width: 20vw; margin: 20px;">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="width: 20vw; margin: 20px;">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="width: 20vw; margin: 20px;">
                        <img src="./img/social.png" alt="Fasilitas">
                    </div>
                </div>
            </div>
            </center>
            <center>
                <a href="#" style="color: #818FEC;">Follow us on @PT.Unifarma</a>
            </center>    
        </div>
    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>