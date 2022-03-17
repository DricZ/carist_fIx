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

            //Display
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td><img src='$path' width='200'></td>";
            echo "<td><b>$nama</b></td>";
            echo "<td style='white-space: pre-line'>$deskripsi</td>";
            echo "<td style='white-space: pre-line'>$kandungan</td>";
            echo "<td style='white-space: pre-line'>$cara_pakai</td>";
            echo "<td>$bpom</td>";
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