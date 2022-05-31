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
    $line = $_POST['line'];
    $penawaran = $_POST['penawaran'];
    $keterangan = $_POST['keterangan'];
    $brand_partner = $_POST['brand_partner'];
    $instagram_partner = $_POST['instagram_partner'];
    $contact = $_POST['contact'];
    $sales_id = $my_id;
    $success = true;
    $notif = "";

    $sql = "SELECT * FROM potential_client WHERE LOWER(nama_brand) = LOWER('$nama_brand') OR LOWER(instagram) = LOWER('$instagram') OR (LOWER(whatsapp) = LOWER('$whatsapp') AND $whatsapp IS NOT '')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $success = false;
            $notif = "Data Already Exist";
            echo "Data already exist <br>";
            echo "<a href='../potential_client.php'>Back</a>";

        }
    } else {
        //Data not exist

        //Upload file
        $target_dir = "../drive/bukti_marketing/";
        if($_FILES["bukti"] > 0){
            $rename_file = "bukti" . "_" . basename($_FILES["bukti"]["name"]);
            $target_file = $target_dir . $rename_file;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["bukti"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            }

            // Check if file already exists
            // if (file_exists($target_file)) {
            //     echo "Sorry, file already exists.";
            //     $uploadOk = 0;
            // }

            // Check file size
            if ($_FILES["bukti"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $success = false;
                $notif = "Sorry, your file was not uploaded";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["bukti"]["name"])). " has been uploaded.";
                    //SAVE TO DATABASE
                    //Upload Data
                    $sql = "INSERT INTO `potential_client` (`id`, `nama_brand`, `instagram`, `whatsapp`, `line`, `contact`, `penawaran`, `keterangan`, `tanggal`, `brand_partner`, `instagram_partner`, `sales_id`, `bukti`)
                    VALUES (NULL, '$nama_brand', '$instagram', '$whatsapp', '$line', '$contact', '$penawaran', '$keterangan', current_timestamp(), '$brand_partner', '$instagram_partner', $my_id, '$rename_file');";
                    if ($conn->query($sql) === TRUE) {
                        $last_id = $conn->insert_id;
                        //echo "New record created successfully";
                        
                    } else {
                        $success = false;
                        $notif =  "SQL Error: " . $sql . $conn->error;
                        echo "SQL Error: " . $sql . $conn->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $success = false;
                    $notif = "Sorry, there was an error uploading your file.";
                }
            }
        }//End IF Upload Files

        
    }

    

    $conn->close();

    //Redirect Back
    if($success){
        header("Location: ../potential_client.php");
    }else{
        header("Location: ../potential_client.php?notif=$notif");
    }
?>