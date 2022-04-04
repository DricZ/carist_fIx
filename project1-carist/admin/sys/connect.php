<?php
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "carist_panel";

  $servername = "srv25.niagahoster.com";
  $username = "u1653205_admin";
  $password = "admincarist";
  $dbname = "u1653205_carist_panel";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>