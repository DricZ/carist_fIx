<?php
    require "sys/connect.php";

    echo "<a href='./add_product.php'>Add Product</a>";

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Kandungan</th>
                <th>Cara Pakai</th>
                <th>BPOM</th>
                <th>Category</th>
            </tr>";

    $sql = "SELECT * FROM product";
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

    echo "</table>";

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
</head>
<body>
    
</body>
</html>