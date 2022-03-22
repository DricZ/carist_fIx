<?php
        require_once 'include.php';
        require_once 'header.php';
        require "admin/sys/connect.php";

        $sql = "SELECT * FROM product LIMIT 16";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $relative = "../img/PRODUK/";
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
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td><img src='$path' width='200'></td>";
                echo "<td><b>$nama</b></td>";
                echo "<td style='white-space: pre-line'>$deskripsi</td>";
                echo "<td style='white-space: pre-line'>$kandungan</td>";
                echo "<td style='white-space: pre-line'>$cara_pakai</td>";
                echo "<td>$bpom</td>";
                echo "<td>$category</td>";
                echo "</tr>";
                
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