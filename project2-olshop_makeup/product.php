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
        <!-- The sidebar -->
        <div class="sidebar">
            <h3 style="color: white; margin: 20px; margin-top: 40px">Category</h3>
            <a class="active" href="#home">BASED ON PRODUCT SERIES</a>
                <a href="#news">ALFACID SERIES</a>
                <a href="#news">SERUM & NUTRIVE CREAM</a>
                <a href="#news">MOISTURIZING SERIES</a>
            <a href="#news">BASED ON PRODUCT TYPE</a>
            <a href="#contact">BASED ON SKIN CONDITION</a>
        </div>

        <!-- Page content -->
        <div class="content">

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

    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>