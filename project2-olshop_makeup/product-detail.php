<?php
        require_once 'include.php';
        require_once 'header.php';
        require "admin/sys/connect.php";
        $name = $_GET["name"];

        $sql = "SELECT * FROM product WHERE nama = '$name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if($row = $result->fetch_assoc()) {
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

                //Search Category
                $sql2 = "SELECT category.category_id AS category_id, category_list.nama FROM category LEFT JOIN category_list ON category.category_id = category_list.id WHERE product_id = '$id'";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    // output data of each row
                    while($row2 = $result2->fetch_assoc()) {
                        $temp = $row2['nama'];
                        $category = $category . $temp . ", ";
                    }
                }

                //Display
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

        <style>
            html,body {
                height: 100%;
            }
        </style>

    </head>

    <body>
        <div class="container-fluid m-product pd-mb p-2" style="background-color: #2B388F;align-items: center;">
            <ul class="nav m-product m-index">
                <li class="nav-item">
                    <a class="nav-link nav-product" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-product disabled" style="color: white;" href="#">></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-product" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-product disabled" style="color: white;" href="#">></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link nav-product" href="#">PRODUCT SERIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-product disabled" style="color: white;" href="#">></a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link nav-product" href="#"><?=$nama?></a>
                </li>
            </ul>
        </div>

        <hr class="d-index"/>
        
        <div class="container" style="">
            <div class="row d-produk">
                <div class="col-4">
                    <center>
                        <div class="row">
                            <div class="col-12">
                                <img class="p-foto" src="<?=$path?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <img class="p-lain" src="<?=$path?>">

                                <img class="p-lain" src="<?=$path?>">   

                                <img class="p-lain" src="<?=$path?>">
                            </div>
                        </div>
                    </center>    
                </div>
                <div class="col-8">
                    <h3><b><?=$nama?></b></h3>
                    <p>
                        <?=$deskripsi?>
                    </p><br>

                    <a onclick="enlarge('ing', 'ingi')">
                        <b>Ingredients</b>
                        <i class="fa-solid fa-angle-right" id="ingi"></i>
                    </a>
                    <p id="ing" hidden>
                        <?=$kandungan?>
                    </p>
                    <br><br>

                    <a onclick="enlarge('cp', 'cpi')">
                        <b>Cara penggunaan</b>
                        <i class="fa-solid fa-angle-right" id="cpi"></i>
                    </a>
                    <p id="cp" hidden>
                        <?=$cara_pakai?>
                    </p><br>

                    <hr/>

                    <p>
                        NO BPOM: <?=$bpom?>
                    </p>
                </div>
            </div>

            <div class="row m-index">
                <div id="products" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button style="background-color: #2B388F" type="button" data-bs-target="#products" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button style="background-color: #2B388F" type="button" data-bs-target="#products" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button style="background-color: #2B388F" type="button" data-bs-target="#products" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button style="background-color: #2B388F" type="button" data-bs-target="#products" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>

                <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row" style="justify-content: center;">
                                <div class="card" style="border: 0; width: 70%; margin-bottom: 25px">
                                    <img class="card-img-top product" src="<?=$path?>" alt="Produk">
                                    <center class="judul pr"><?=$nama?></center>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row" style="justify-content: center;">
                                <div class="card"  style="border: 0; width: 70%; margin-bottom: 25px">
                                    <img class="card-img-top product" src="<?=$path?>" alt="Produk">
                                    <center class="judul pr"><?=$nama?></center>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-index mt-5">
                <p style="font-weight: 900; font-family: 'Merriweather'; font-size: 24px"><b><?=$nama?></b></p>
                    <p style="font-size: 16px">
                        <?=$deskripsi?>
                    </p><br>

                    <a style="font-weight: 600; font-size: 16px" onclick="enlarge('ing1', 'ingi1')">
                        Ingredients
                        <i class="fa-solid fa-angle-right" id="ingi1"></i>
                    </a>
                    <p style="font-size: 16px" id="ing1" hidden>
                        <?=$kandungan?>
                    </p>
                    <br><br>

                    <a style="font-weight: 600; font-size: 16px" onclick="enlarge('cp1', 'cpi1')">
                        Cara penggunaan
                        <i class="fa-solid fa-angle-right" id="cpi1"></i>
                    </a>
                    <p style="font-size: 16px" id="cp1" hidden>
                        <?=$cara_pakai?>
                    </p><br>

                    <hr/>

                    <p style="font-size: 16px">
                        NO BPOM: <?=$bpom?>
                    </p>
            </div>

        </div>

        <script>
            function enlarge(id, iid){
                x = document.getElementById(id);
                y = document.getElementById(iid);
                console.log(y);

                if (x.hasAttribute('hidden')) {
                    x.removeAttribute('hidden');
                    y.classList.remove('fa-angle-right');
                    y.classList.add('fa-angle-down');
                } else {
                    x.setAttribute('hidden', 'hidden');
                    y.classList.remove('fa-angle-down');
                    y.classList.add('fa-angle-right');
                }
            }
        </script>
    
    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>