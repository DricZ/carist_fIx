<?php
    session_start();
    require "connect.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE username='$username' AND pass='$password'";
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        $_SESSION["userid"] = $row["user_id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["role1"] = $row["role1"];
        $_SESSION["role2"] = $row["role2"];
        $_SESSION["name"] = $row["name"];
        header("Location: ../dashboard.php");
    } else {
        header("Location: ../?wrong=true");
    }
    $conn->close();
    
    die();
?>