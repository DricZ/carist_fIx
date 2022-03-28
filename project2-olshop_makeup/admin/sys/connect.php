<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "ufi";

    $servername = "srv36.niagahoster.com";
    $username = "u4028980_admin";
    $password = "ufiadmin";
    $dbname = "u4028980_ufi";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>