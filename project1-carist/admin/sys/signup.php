<?php
    session_start();
    require "connect.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    // $email = $_POST["email"];
    // $phone = $_POST["phone"];
    // $city = $_POST["city"];
    // $address = $_POST["address"];
    // $birthday = $_POST["birthday"];
    // $instagram = $_POST["instagram"];
    // $tiktok = $_POST["tiktok"];

    //Cek username
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        header("Location: ../?alert=Username%20Already%20Exist%20!!");
        die();
    }

    //Input ke Database
    $sql = "INSERT INTO user (username, pass, name, status)
    VALUES ('$username', '$password', '$name', 'pending')";
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        //Redirect Back
        header("Location: ../?alert=Sign%20Up%20Success%20!!");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        die();
    }
    $conn->close();
    die();
?>