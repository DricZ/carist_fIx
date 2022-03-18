<?php
    require "connect.php";
    $product_name = $_POST["nama"];
    $category = $_POST["category"];
    

    //Cari Product ID
    $sql = "SELECT * FROM product WHERE nama='$product_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        if($row = $result->fetch_assoc()) {
            $product_id = $row['id'];
        }
    }

    //Cari Category ID
    $sql = "SELECT * FROM category_list WHERE nama='$category'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        if($row = $result->fetch_assoc()) {
            $category_id = $row['id'];
        }
    }
    
    //Masukkan ke DB
    $sql = "INSERT INTO category (category_id, product_id)
            VALUES ($category_id, $product_id)";
    $result = $conn->query($sql);

    if ($result === TRUE) { //Jika input client ke Database Sukses
        echo "<br>Set Kategori Sukses!<br>";
        echo "<a href='../choose_category.php'>Back</a>";
    }
?>