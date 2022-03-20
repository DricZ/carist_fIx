<?php
    session_start();
    require "connect.php";
    $title = $_POST['title'];
    $news = $_POST['news'];

    //Upload Gambar untuk dapet link
    $target_dir = "../../img/news/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $basename = basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    //if (file_exists($target_file)) {
    //    echo "Sorry, file already exists.";
    //    $uploadOk = 0;
    //}

    // Check file size
    if ($_FILES["img"]["size"] > 500000000) {
        echo "Sorry, your file is too large. Maximum is 500MB";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    $uploadSuccess = False;
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
            $uploadSuccess = True;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if (!$uploadSuccess){
        echo "<br><a href='../index.php'>Home</a><br>";
        die();    //Comment untuk skip file upload
    }

    //Masukkan ke DB
    $sql = "INSERT INTO news (title, img, news)
            VALUES ('$title', '$basename', '$news')";
    $result = $conn->query($sql);

    if ($result === TRUE) { //Jika input client ke Database Sukses
        echo "<br>Upload News Sukses!<br>";
        echo "<a href='../add_news.php'>Back</a>";
    }
?>