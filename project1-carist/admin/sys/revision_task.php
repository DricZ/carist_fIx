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
    $sqlStatus = $step . "_status";



    //SQL
    $sql = "UPDATE task SET $sqlStatus='revision' WHERE task_id=$task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        //Redirect Back
        header("Location: ../review_task.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>