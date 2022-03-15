<?php
    require "sys/connect.php";

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
            echo "<img src='$path' width='400'>";
            echo "<h2>$nama</h2>";
        }
    }
?>

