<?php
    session_start();
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ../login.php");
    }
    require "connect.php";

    $client = $_POST["client"];
    $contentwriter = $_POST["contentwriter"];
    $feed = $_POST["feed"];
    $story = $_POST["story"];
    $reels = $_POST["reels"];
    $tiktok = $_POST["tiktok"];

    //Update feed task
    $sql = "UPDATE task
    SET contentwriter_id = $contentwriter
    WHERE client_id = $client AND content_type = 'feed' AND contentwriter_id = 0
    ORDER BY task_id
    LIMIT $feed;";
    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
    } else {
        echo "Error assigning task: " . $conn->error;
    }

    //Update story task
    $sql = "UPDATE task
    SET contentwriter_id = $contentwriter
    WHERE client_id = $client AND content_type = 'story' AND contentwriter_id = 0
    ORDER BY task_id
    LIMIT $story;";
    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
    } else {
        echo "Error assigning task: " . $conn->error;
    }

    //Update reels task
    $sql = "UPDATE task
    SET contentwriter_id = $contentwriter
    WHERE client_id = $client AND content_type = 'reels' AND contentwriter_id = 0
    ORDER BY task_id
    LIMIT $reels;";
    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
    } else {
        echo "Error assigning task: " . $conn->error;
    }

    //Update tiktok task
    $sql = "UPDATE task
    SET contentwriter_id = $contentwriter
    WHERE client_id = $client AND content_type = 'tiktok' AND contentwriter_id = 0
    ORDER BY task_id
    LIMIT $tiktok;";
    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
    } else {
        echo "Error assigning task: " . $conn->error;
    }

    $conn->close();

    //Redirect Back
    header("Location: ../dashboard.php");
?>