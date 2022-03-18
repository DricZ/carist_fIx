<?php

    require "../admin/sys/connect.php";

    //Fetch for JSON
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    $json = json_encode($outp);
    echo $json;

?>