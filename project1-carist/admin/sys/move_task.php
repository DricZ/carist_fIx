<?php
    session_start();
    require "connect.php";
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
    }
    //NOT SECURED
    
    $task_id = $_GET['task_id'];
    $step = $_GET['step'];
    $moveto = $_GET['moveto'];
    $sqlStatus = $step . "_status";
    $sqlid = $step . "_id";



    //SQL
    $sql = "UPDATE task SET $sqlStatus='pending', $sqlid='$moveto' WHERE task_id=$task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        //Redirect Back
        //header("Location: ../review_task.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>