<?php
    session_start();
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ../login.php");
    }
    require "connect.php";

    $task_id = $_POST['task_id'];
    
    $target_dir = "../drive/design/";

    //DESIGN 1
    for ($i=1; $i<=5; $i++){
        if($_FILES["design$i"] > 0){
            $rename_file = "task$task_id-" . "design$i-" . basename($_FILES["design$i"]["name"]);
            $target_file = $target_dir . $rename_file;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["design$i"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["design$i"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["design$i"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["design$i"]["name"])). " has been uploaded.";
                    //SAVE TO DATABASE
                    $sql = "UPDATE task SET design_$i='$rename_file' WHERE task_id=$task_id";

                    if ($conn->query($sql) === TRUE) {
                        //echo "Record $i updated successfully";
                        //Redirect Back
                        header("Location: ../my_task.php");
                    } else {
                        echo "Error updating record: " . $conn->error;
                        die();
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    die();
                }
            }
        }//End If
    }//End Loop
?>