<?php
    session_start();
    require "connect.php";

    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $kandungan = $_POST["kandungan"];
    $cara_pakai = $_POST["cara_pakai"];
    $bpom = $_POST["bpom"];
?>