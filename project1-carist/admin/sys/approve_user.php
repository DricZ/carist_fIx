<?php
    session_start();
    require "connect.php";
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
    }
    //NOT SECURED
    
    $id = $_GET['id'];
    $role = $_GET['role'];



    //SQL
    $sql = "UPDATE user SET role1='$role', status='active' WHERE user_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        //Redirect Back
        header("Location: ../user_list.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>