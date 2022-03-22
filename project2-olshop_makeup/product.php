<?php
        require_once 'include.php';
        require_once 'header.php';
        require "admin/sys/connect.php";

        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
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
        <div class="container-fluid"  style="background-color: #2B388F; margin-top: -15px;">
            <!-- The sidebar -->
            <div class="sidebar">
                <h3 style="color: white; margin: 20px; margin-top: 40px">Category</h3>

                <a onclick="openbar('bar1')" class="">Based on PRODUCT HIGHLIGHT</a>
                <div id="bar1" hidden>
                    <a class="dalem" onclick="">Best Seller / Recomendation</a>
                    <a class="dalem" onclick="">New Arrival</a>
                </div>

                <a onclick="openbar('bar2')" class="">Based on SKIN TYPE</a>
                <div id="bar2" hidden>
                    <a class="dalem" onclick="">All Skin Type</a>
                    <a class="dalem" onclick="">Normal</a>
                    <a class="dalem" onclick="">Dry Skin</a>
                    <a class="dalem" onclick="">Oily Skin</a>
                    <a class="dalem" onclick="">Sensitive Skin</a>
                </div>

                <a onclick="openbar('bar3')" class="">Based on SKIN CONDITION</a>
                <div id="bar3" hidden>
                    <a class="dalem" onclick="">Normal</a>
                    <a class="dalem" onclick="">Kusam</a>
                    <a class="dalem" onclick="">Berjerawat</a>
                    <a class="dalem" onclick="">Aging</a>
                    <a class="dalem" onclick="">Kering</a>
                    <a class="dalem" onclick="">Inflamasi</a>
                </div>

                <a onclick="openbar('bar4')" class="">Based on ACNE SEVERITY</a>
                <div id="bar4" hidden>
                    <a class="dalem" onclick="">All Condition</a>
                    <a class="dalem" onclick="">Komedo</a>
                    <a class="dalem" onclick="">Papule (light)</a>
                    <a class="dalem" onclick="">Pustule (Medium)</a>
                    <a class="dalem" onclick="">Nodule ( Severe)</a>
                </div>

                <a onclick="openbar('bar5')" class="">Based on PRODUCT TYPE</a>
                <div id="bar5" hidden>
                    <a class="dalem" onclick="">Face Wash</a>
                    <a class="dalem" onclick="">Face Cleanser</a>
                    <a class="dalem" onclick="">Face Toner</a>
                    <a class="dalem" onclick="">Serum</a>
                    <a class="dalem" onclick="">Cream</a>
                    <a class="dalem" onclick="">Gel</a>
                    <a class="dalem" onclick="">Lotion</a>
                    <a class="dalem" onclick="">Body Care</a>
                    <a class="dalem" onclick="">Neutralizing</a>
                    <a class="dalem" onclick="">Peeling</a>
                    <a class="dalem" onclick="">Decorative</a>
                </div>

                <a onclick="openbar('bar6')" class="">Based on FUNCTION</a>
                <div id="bar6" hidden>
                    <a class="dalem" onclick="">Sunscreen</a>
                    <a class="dalem" onclick="">Moisturizer</a>
                    <a class="dalem" onclick="">Brightening</a>
                    <a class="dalem" onclick="">Acne Care</a>
                    <a class="dalem" onclick="">Anti Aging</a>
                    <a class="dalem" onclick="">Nutritive</a>
                    <a class="dalem" onclick="">Conditioning</a>
                </div>

                <a onclick="openbar('bar7')" class="">Based on BRAND</a>
                <div id="bar7" hidden>
                    <a class="dalem" onclick="">Alfacid</a>
                    <a class="dalem" onclick="">Primaderma</a>
                    <a class="dalem" onclick="">Hydrosnail</a>
                    <a class="dalem" onclick="">Solasense</a>
                </div>
            </div>

            <!-- Page content -->
            <div class="content" style="background-color: white">

                <center>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>
                </div>    

                <div class="row">
                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p" onclick="openProduk()">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>
                </div>
                </center>
            </div>
        </div>
        <script>
        function openbar(id) {
            var x = document.getElementById(id);
            if (x.hasAttribute('hidden')) {
                x.removeAttribute('hidden');
            } else {
                x.setAttribute('hidden', 'hidden');
            }
        }

        function openProduk(){
            window.location.href = 'product-detail.php';
        }
        </script>

    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>