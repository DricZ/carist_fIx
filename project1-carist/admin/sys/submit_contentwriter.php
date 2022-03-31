<?php
    session_start();
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ../login.php");
    }
    require "connect.php";

    $task_id = $_POST['task_id'];
    $main_topic = $_POST['main_topic'];
    $sub_topic = $_POST['sub_topic'];
    $concept = $_POST['concept'];
    $ref_link = $_POST['ref_link'];
    $notes = $_POST['notes'];

    var_dump($_POST);

    $sql = "UPDATE task SET main_topic='$main_topic', sub_topic='$sub_topic', concept='$concept', ref_link='$ref_link', content_notes='$notes' WHERE task_id=$task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        //Redirect Back
        header("Location: ../my_task.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>