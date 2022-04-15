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
    $nextstep = $_GET['nextstep'];
    $approveto = $_GET['approveto'];

    $sqlStatus = $step . "_status";
    $nextName = $nextstep . "_id";



    //SQL
    $sql = "UPDATE task SET $sqlStatus='approved', $nextName='$approveto' WHERE task_id=$task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        //Redirect Back
        header("Location: ../review_task.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>