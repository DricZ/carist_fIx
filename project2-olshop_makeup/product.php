<?php
        require_once 'include.php';
        require_once 'header.php';
        require "admin/sys/connect.php";
        

        $sql = "SELECT * FROM product LIMIT 16";
        if(isset($_GET['filter'])){
            $filter = $_GET['filter'];
            echo "    Category: ".$filter;
        }
        $result = $conn->query($sql);

        
                // //Display
                // echo "<tr>";
                // echo "<td>$id</td>";
                // echo "<td><img src='$path' width='200'></td>";
                // echo "<td><b>$nama</b></td>";
                // echo "<td style='white-space: pre-line'>$deskripsi</td>";
                // echo "<td style='white-space: pre-line'>$kandungan</td>";
                // echo "<td style='white-space: pre-line'>$cara_pakai</td>";
                // echo "<td>$bpom</td>";
                // echo "<td>$category</td>";
                // echo "</tr>";
                
            
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
                    <a class="dalem" href="?filter=Best Seller / Recomendation">Best Seller / Recomendation</a>
                    <a class="dalem" href="?filter=New Arrival">New Arrival</a>
                </div>

                <a onclick="openbar('bar2')" class="">Based on SKIN TYPE</a>
                <div id="bar2" hidden>
                    <a class="dalem" href="?filter=All Skin Type">All Skin Type</a>
                    <a class="dalem" href="?filter=Normal">Normal</a>
                    <a class="dalem" href="?filter=Dry Skin">Dry Skin</a>
                    <a class="dalem" href="?filter=Oily Skin">Oily Skin</a>
                    <a class="dalem" href="?filter=Sensitive Skin">Sensitive Skin</a>
                </div>

                <a onclick="openbar('bar3')" class="">Based on SKIN CONDITION</a>
                <div id="bar3" hidden>
                    <a class="dalem" href="?filter=Normal">Normal</a>
                    <a class="dalem" href="?filter=Kusam">Kusam</a>
                    <a class="dalem" href="?filter=Berjerawat">Berjerawat</a>
                    <a class="dalem" href="?filter=Aging">Aging</a>
                    <a class="dalem" href="?filter=Kering">Kering</a>
                    <a class="dalem" href="?filter=Inflamasi">Inflamasi</a>
                </div>

                <a onclick="openbar('bar4')" class="">Based on ACNE SEVERITY</a>
                <div id="bar4" hidden>
                    <a class="dalem" href="?filter=All Condition">All Condition</a>
                    <a class="dalem" href="?filter=Komedo">Komedo</a>
                    <a class="dalem" href="?filter=Papule (light)">Papule (light)</a>
                    <a class="dalem" href="?filter=Pustule (Medium)">Pustule (Medium)</a>
                    <a class="dalem" href="?filter=Nodule (Severe)">Nodule (Severe)</a>
                </div>

                <a onclick="openbar('bar5')" class="">Based on PRODUCT TYPE</a>
                <div id="bar5" hidden>
                    <a class="dalem" href="?filter=Face Wash">Face Wash</a>
                    <a class="dalem" href="?filter=Face Cleanser">Face Cleanser</a>
                    <a class="dalem" href="?filter=Face Toner">Face Toner</a>
                    <a class="dalem" href="?filter=Serum">Serum</a>
                    <a class="dalem" href="?filter=Cream">Cream</a>
                    <a class="dalem" href="?filter=Gel">Gel</a>
                    <a class="dalem" href="?filter=Lotion">Lotion</a>
                    <a class="dalem" href="?filter=Body Care">Body Care</a>
                    <a class="dalem" href="?filter=Neutralizing">Neutralizing</a>
                    <a class="dalem" href="?filter=Peeling">Peeling</a>
                    <a class="dalem" href="?filter=Decorative">Decorative</a>
                </div>

                <a onclick="openbar('bar6')" class="">Based on FUNCTION</a>
                <div id="bar6" hidden>
                    <a class="dalem" href="?filter=Sunscreen">Sunscreen</a>
                    <a class="dalem" href="?filter=Moisturizer">Moisturizer</a>
                    <a class="dalem" href="?filter=Brightening">Brightening</a>
                    <a class="dalem" href="?filter=Acne Care">Acne Care</a>
                    <a class="dalem" href="?filter=Anti Aging">Anti Aging</a>
                    <a class="dalem" href="?filter=Nutritive">Nutritive</a>
                    <a class="dalem" href="?filter=Conditioning">Conditioning</a>
                </div>

                <a onclick="openbar('bar7')" class="">Based on BRAND</a>
                <div id="bar7" hidden>
                    <a class="dalem" href="?filter=Alfacid">Alfacid</a>
                    <a class="dalem" href="?filter=Primaderma">Primaderma</a>
                    <a class="dalem" href="?filter=Hydrosnail">Hydrosnail</a>
                    <a class="dalem" href="?filter=Solasense">Solasense</a>
                </div>
            </div>

            <!-- Page content -->
            <div class="content" style="background-color: white;">
                
                
            <div class="row">
                <?php
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
                ?>
                <div class="col-md-3">
                    <div class="card produk-p" onclick="openProduk('<?=$nama?>')">
                        <img src="<?=$path?>" alt="<?=$img?>">
                        <center class="judul pr"><?=$nama?></center>
                        <center><p><i>Best Seller, Alfacid</i></p></center>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>

                
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

        function openProduk(nama){
            let link = 'product-detail.php?name=' + nama;
            window.location.href = link;
        }
        </script>

    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>