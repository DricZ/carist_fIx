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
        <div class="container-fluid"  style="background-color: #2B388F;     margin-top: -15px;">
            <!-- The sidebar -->
            <div class="sidebar">
                <h3 style="color: white; margin: 20px; margin-top: 40px">Category</h3>

                <a onclick="openbar('bar1')" class="">Based on PRODUCT HIGHLIGHT</a>
                <div id="bar1" hidden>
                    <a onclick="">Best Seller / Recomendation</a>
                    <a onclick="">New Arrival</a>
                </div>

                <a onclick="openbar('bar2')" class="">Based on SKIN TYPE</a>
                <div id="bar2" hidden>
                    <a onclick="">All Skin Type</a>
                    <a onclick="">Normal</a>
                    <a onclick="">Dry Skin</a>
                    <a onclick="">Oily Skin</a>
                    <a onclick="">Sensitive Skin</a>
                </div>

                <a onclick="openbar('bar3')" class="">Based on SKIN CONDITION</a>
                <div id="bar3" hidden>
                    <a onclick="">Normal</a>
                    <a onclick="">Kusam</a>
                    <a onclick="">Berjerawat</a>
                    <a onclick="">Aging</a>
                    <a onclick="">Kering</a>
                    <a onclick="">Inflamasi</a>
                </div>

                <a onclick="openbar('bar4')" class="">Based on ACNE SEVERITY</a>
                <div id="bar4" hidden>
                    <a onclick="">All Condition</a>
                    <a onclick="">Komedo</a>
                    <a onclick="">Papule (light)</a>
                    <a onclick="">Pustule (Medium)</a>
                    <a onclick="">Nodule ( Severe)</a>
                </div>

                <a onclick="openbar('bar5')" class="">Based on PRODUCT TYPE</a>
                <div id="bar5" hidden>
                    <a onclick="">Face Wash</a>
                    <a onclick="">Face Cleanser</a>
                    <a onclick="">Face Toner</a>
                    <a onclick="">Serum</a>
                    <a onclick="">Cream</a>
                    <a onclick="">Gel</a>
                    <a onclick="">Lotion</a>
                    <a onclick="">Body Care</a>
                    <a onclick="">Neutralizing</a>
                    <a onclick="">Peeling</a>
                    <a onclick="">Decorative</a>
                </div>

                <a onclick="openbar('bar6')" class="">Based on FUNCTION</a>
                <div id="bar6" hidden>
                    <a onclick="">Sunscreen</a>
                    <a onclick="">Moisturizer</a>
                    <a onclick="">Brightening</a>
                    <a onclick="">Acne Care</a>
                    <a onclick="">Anti Aging</a>
                    <a onclick="">Nutritive</a>
                    <a onclick="">Conditioning</a>
                </div>

                <a onclick="openbar('bar7')" class="">Based on BRAND</a>
                <div id="bar7" hidden>
                    <a onclick="">Alfacid</a>
                    <a onclick="">Primaderma</a>
                    <a onclick="">Hydrosnail</a>
                    <a onclick="">Solasense</a>
                </div>
            </div>

            <!-- Page content -->
            <div class="content" style="background-color: white">

                <center>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>
                </div>    

                <div class="row">
                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
                            <img src="./img/produk/Acne Loose Powder Lo1.jpg" alt="Fasilitas">
                            <center class="judul pr">Nama Produk</center>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card produk-p">
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
        </script>

    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>