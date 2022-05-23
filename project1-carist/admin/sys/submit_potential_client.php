<?php
    session_start();
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ../login.php");
    }
    require "connect.php";
    $my_id = $_SESSION['userid'];

    $nama_brand = $_POST['nama_brand'];
    $instagram = $_POST['instagram'];
    $whatsapp = $_POST['whatsapp'];
    $penawaran = $_POST['penawaran'];
    $keterangan = $_POST['keterangan'];
    $brand_partner = $_POST['brand_partner'];
    $instagram_partner = $_POST['instagram_partner'];
    $contact = $_POST['contact'];
    $sales_id = $my_id;
    $data_exist = false;

    $sql = "SELECT * FROM potential_client WHERE LOWER(nama_brand) = LOWER('$nama_brand') OR LOWER(instagram) = LOWER('$instagram') OR LOWER(whatsapp) = LOWER('$whatsapp')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $data_exist = true;
            echo "Data already exist <br>";
            echo "<a href='../potential_client.php'>Back</a>";
            die();
        }
    } else {
        //Data not exist
        $sql = "INSERT INTO `potential_client` (`id`, `nama_brand`, `instagram`, `whatsapp`, `contact`, `penawaran`, `keterangan`, `tanggal`, `brand_partner`, `instagram_partner`, `sales_id`)
        VALUES (NULL, '$nama_brand', '$instagram', '$whatsapp', '$contact', '$penawaran', '$keterangan', current_timestamp(), '$brand_partner', '$instagram_partner', $my_id);";
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    

    $conn->close();

    //Redirect Back
    header("Location: ../potential_client.php");
?>