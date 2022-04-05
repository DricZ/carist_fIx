<?php
    session_start();
    require "connect.php";
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
    }
    $my_id = $_SESSION['userid'];
    
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $instagram = $_POST['instagram'];
    $tiktok = $_POST['tiktok'];



    //SQL
    $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', city='$city', address='$address', birthday='$birthday', instagram='$instagram', tiktok='$tiktok' WHERE user_id=$my_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        //Redirect Back
        header("Location: ../my_profile.php?update=success");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>