<?php
    session_start();
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ../login.php");
    }
    require "connect.php";

    $task_id = $_POST['task_id'];
    $caption = $_POST['caption'];
    $hashtag = $_POST['hashtag'];

    var_dump($_POST);

    $sql = "UPDATE task SET main_topic='$main_topic', sub_topic='$sub_topic', concept='$concept', ref_link='$ref_link', content_notes='$notes', contentwriter_submitdate=CURDATE() WHERE task_id=$task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        //Redirect Back
        header("Location: ../my_task.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>