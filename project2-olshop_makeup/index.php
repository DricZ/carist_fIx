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
        <div class="container-fluid banner ">
            
        </div>

        <div class="container pb-1 text-center ">
            <h3 class="ub">OUR BRANDS</h3>
            <div class="row">
                <div class="col-3 text-center">
                    <img class="logo-footer-a" src="./img/Alfacid.png">
                </div>
                <div class="col-3 text-center">
                    <img class="logo-footer-a" src="./img/SolaSense.png">
                </div>
                <div class="col-3 text-center">
                    <img class="logo-footer-a" src="./img/logo primaderma.png">
                </div>
                <div class="col-3 text-center">
                    <img class="logo-footer-a" src="./img/Hydrosnail.png">
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-4 text-center">
                    <img class="logo-footer-b1" src="./img/Kaneira.png">
                </div>

                <div class="col-4 text-center">
                    <img class="logo-footer-b2" src="./img/Beaulash Logo-02.png">
                </div>

                <div class="col-4 text-center">
                    <img class="logo-footer-b3" src="./img/Skinesse.png">
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
                            <?php
                                $sql = "SELECT * FROM product";
                                $filter = "Best Seller / Recomendation";
                                // Get Category ID
                                $sql2 = "SELECT * FROM category_list WHERE nama='$filter'";
                                $result2 = $conn->query($sql2);
                                

                                if ($result2->num_rows > 0) {
                                    if($row = $result2->fetch_assoc()) {
                                        $category_id = $row['id'];
                                    }
                                }
                                //echo "Category: ".$filter."($category_id)";

                                $sql .= " LEFT JOIN category ON product.id = category.product_id WHERE category.category_id = $category_id";
                                $sql .= " LIMIT 4";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['id'];
                                        $relative = "./img/PRODUK/";
                                        $img = $row['img'];
                                        $path = $relative . $img;
                                        $nama = $row['nama'];
                                        $deskripsi = $row['deskripsi'];
                                        $kandungan = $row['kandungan'];
                                        $cara_pakai = $row['cara_pakai'];
                                        $bpom = $row['bpom'];
                                        $category = "";
                            ?>
                                <div class="card p ">
                                    <img class="card-img-top product" src="<?=$path?>" alt="Produk">
                                    <center class="judul pr"><?=$nama?></center>
                                </div>
                            <?php
                                    }
                                }
                            ?>
                            </div>
                        </div>
                        <?php
                            for($i = 1; $i<3; $i++){
                        ?>
                        <div class="carousel-item">
                            <div class="row" style="justify-content: center;">
                            <?php
                                $sql = "SELECT * FROM product";
                                $filter = "Best Seller / Recomendation";
                                // Get Category ID
                                $sql2 = "SELECT * FROM category_list WHERE nama='$filter'";
                                $result2 = $conn->query($sql2);
                                

                                if ($result2->num_rows > 0) {
                                    if($row = $result2->fetch_assoc()) {
                                        $category_id = $row['id'];
                                    }
                                }
                                //echo "Category: ".$filter."($category_id)";

                                $sql .= " LEFT JOIN category ON product.id = category.product_id WHERE category.category_id = $category_id";
                                $start = $i*4;
                                $sql .= " LIMIT $start, 4";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['id'];
                                        $relative = "./img/PRODUK/";
                                        $img = $row['img'];
                                        $path = $relative . $img;
                                        $nama = $row['nama'];
                                        $deskripsi = $row['deskripsi'];
                                        $kandungan = $row['kandungan'];
                                        $cara_pakai = $row['cara_pakai'];
                                        $bpom = $row['bpom'];
                                        $category = "";
                            ?>
                                <div class="card p ">
                                    <img class="card-img-top product" src="<?=$path?>" alt="Produk">
                                    <center class="judul pr"><?=$nama?></center>
                                </div>
                            <?php
                                    }
                                }
                            ?>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
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
                    <button type="button" class="button-active btn-2" value="SHOP" onclick="" style="margin: 50px;">VIEW ALL PRODUCTS</button>

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
                $sql = "SELECT * FROM news LIMIT 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $img = "img/news/".$row['img'];
                        $wrap_limit = 500;
                        $news = $row['news'];
                        $news = strlen($news) > $wrap_limit ? substr($news,0,$wrap_limit)."..." : $news;
                        $upload_date = $row['upload_date'];
                        $phpdate = strtotime($upload_date);
                        $date = date('l, d F Y', $phpdate);
            ?>

            <div class="card c-news" style="border-radius: 35px; margin-bottom: 20px" onclick="buka(<?=$id?>)">
                <div class="row">
                    <div class="col-4">
                        <img src="<?=$img?>" alt="Fasilitas" style="width: 25vw; height: 100%; border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    </div>
                    <div class="col-8" style="padding: 25px">
                        <h3><?=$title?></h3>                
                        <p><?=$news?></b></p>
                        <p><?=$date?></p>
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
                $sql = "SELECT * FROM news LIMIT 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $img = "img/news/".$row['img'];
                        $wrap_limit = 500;
                        $news = $row['news'];
                        $news = strlen($news) > $wrap_limit ? substr($news,0,$wrap_limit)."..." : $news;
                        $upload_date = $row['upload_date'];
                        $phpdate = strtotime($upload_date);
                        $date = date('l, d F Y', $phpdate);
            ?>

            <div class="card c-news" style="border-radius: 35px; margin-bottom: 20px; height: 15vh;" onclick="buka(<?=$id?>)">
                <div class="row">
                    <div class="col-4">
                        <img src="<?=$img?>" alt="Fasilitas" style="width: 25vw; height: 15vh; border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    </div>
                    <div class="col-8" style="padding: 20px">
                        <p style="font-size: 6px"><b><?=$title?></b></p>                
                        <p style="font-size: 4px"><?=$news?></b></p>
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