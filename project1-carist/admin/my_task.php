<?php
    require 'include.php';
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
    }
    $my_id = $_SESSION['userid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Task</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            require 'sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    require 'header.php';
                ?>
                <!-- End of Topbar -->

                <?php
                    require 'sidebar_button.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">My Task</h1>
                    <?php
                        //echo "<h1>My Task</h1>";
                        //echo "<a href='./dashboard.php'>Dashboard</a><br>";

                        $sql = "SELECT * FROM client";
                        $result = $conn->query($sql);
                        $client_count = 0;
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $client_id = $row["client_id"];
                                $client_name = $row["name"];
                                $client_logo = $row["client_logo"];
                                $visit = $row["visit"];

                                //Search All Task with that client ID
                                $sql2 = "SELECT * FROM task WHERE client_id = $client_id AND (contentwriter_id = $my_id OR designer_id = $my_id OR copywriter_id = $my_id)";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    echo "<h3>$client_name</h3>";
                                    $client_count++;
                                    // output data of each row
                                    while($row2 = $result2->fetch_assoc()) {
                                        $task_id = $row2["task_id"];
                                        $content_no = $row2["content_no"];
                                        $content_type = $row2["content_type"];
                                        $main_topic = $row2["main_topic"];
                                        $sub_topic = $row2["sub_topic"];
                                        $concept = $row2["concept"];
                                        $ref_link = $row2["ref_link"];
                                        $notes = $row2["content_notes"];
                                        $relative = "./drive/design/";
                                        $design1 = $relative . $row2["design_1"];
                                        $design2 = $relative . $row2["design_2"];
                                        $design3 = $relative . $row2["design_3"];
                                        $design4 = $relative . $row2["design_4"];
                                        $design5 = $relative . $row2["design_5"];
                                        $caption = $row2["caption"];
                                        $hashtag = $row2["hashtag"];
                                        $display_name = strtoupper($content_type . " " . $content_no);
                                        $section_id = strtolower("task".$task_id);
                                        if($main_topic != ""){
                                            $fieldset = "disabled";
                                        }else{
                                            $fieldset = "";
                                        }
                                        //Check Flow Step
                                        $contentwriter_status = $row2["contentwriter_status"];
                                        $designer_status = $row2["designer_status"];
                                        $copywriter_status = $row2["copywriter_status"];
                                        if($copywriter_status == "pending"){
                                            $step = "copywriter";
                                        }
                                        if($designer_status == "pending"){
                                            $step = "designer";
                                        }
                                        if($contentwriter_status == "pending"){
                                            $step = "contentwriter";
                                        }
                                        //ECHO CONTENTWRITER
                                        // var_dump($contentwriterAccess);
                                        // var_dump($step);
                                        if($step == "contentwriter" && $contentwriterAccess){
                                            echo "<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#$section_id'
                                                aria-expanded='true' aria-controls='$section_id'>
                                                <i class='fa fa-plus-square'></i>
                                                <span><b>$display_name</b></span>
                                            </a>";
                                            echo"<div id='$section_id' class='collapse'>
                                                    <div class='bg-gray-200 py-2 collapse-inner rounded' style='padding: 2%; padding-top: 100px'>
                                                        <form method='post' action='sys/submit_contentwriter.php'>
                                                            <fieldset>
                                                                <div class='row'>
                                                                    <h5>Submit For $display_name (#$section_id) ContentWriter</h5>
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='col-sm-6'>
                                                                        <input type='hidden' name='task_id' value='$task_id'>
                                                                        Main Topic: <input type='text' class='form-control' name='main_topic' value='$main_topic' required><br>
                                                                        Sub Topic: <input type='text' class='form-control' name='sub_topic' value='$sub_topic'><br>
                                                                        Concept: <input type='text' class='form-control' name='concept' value='$concept'><br>
                                                                        Link Referensi: <input type='text'  class='form-control' name='ref_link' value='$ref_link'><br>
                                                                    </div>
                                                                    <div class='col-sm-6'>
                                                                        Notes: <textarea name='notes' rows='10' cols='30' class='form-control'>$notes</textarea><br>
                                                                        <div class='d-grid gap-2 d-md-flex justify-content-md-end'><button class='btn btn-primary'>Submit</button></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>";
                                        } else
                                        //ECHO DESIGNER
                                        if($step == "designer" && $designerAccess){
                                            echo "<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#$section_id'
                                                aria-expanded='true' aria-controls='$section_id'>
                                                <i class='fa fa-plus-square'></i>
                                                <span><b>$display_name</b></span>
                                            </a>";
                                            echo"<div id='$section_id' class='collapse'>
                                                <div class='bg-gray-200 py-2 collapse-inner rounded' style='padding: 2%; padding-top: 100px'>
                                                    <form method='post' action='sys/submit_designer.php' enctype='multipart/form-data'>
                                                        <fieldset>
                                                            <div class='row'>
                                                                <h5>Submit For $display_name (#$section_id) Designer</h5>
                                                            </div>
                                                            <div class='row'>
                                                                <div class='col-sm-6'>
                                                                    Main Topic: $main_topic<br>
                                                                    Sub Topic: $sub_topic<br>
                                                                    Concept: $concept<br>
                                                                    Link Referensi: <a href='$ref_link' target='_blank'>$ref_link</a><br>
                                                                    Notes: $notes<br>
                                                                </div>
                                                                <div class='col-sm-6'>
                                                                    <input type='hidden' name='task_id' value='$task_id'>
                                                                    Design 1 : <input type='file' name='design1' id='design1' class='form-control'><br>
                                                                    Design 2 : <input type='file' name='design2' id='design2' class='form-control'><br>
                                                                    Design 3 : <input type='file' name='design3' id='design3' class='form-control'><br>
                                                                    Design 4 : <input type='file' name='design4' id='design4' class='form-control'><br>
                                                                    Design 5 : <input type='file' name='design5' id='design5' class='form-control'><br><br>
                                                                    <div class='d-grid gap-2 d-md-flex justify-content-md-end'><button class='btn btn-primary'>Submit</button></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>";
                                        } else
                                        //ECHO COPY WRITER
                                        if($step == "copywriter" && $copywriterAccess){
                                            echo "<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#$section_id'
                                                aria-expanded='true' aria-controls='$section_id'>
                                                <i class='fa fa-plus-square'></i>
                                                <span><b>$display_name</b></span>
                                            </a>";
                                            echo"<div id='$section_id' class='collapse'>
                                                <div class='bg-gray-200 py-2 collapse-inner rounded' style='padding: 2%; padding-top: 100px'>
                                                    <form method='post' action='sys/submit_copywriter.php' enctype='multipart/form-data'>
                                                        <fieldset>
                                                            <div class='row'>
                                                                <h5>Submit For $display_name (#$section_id) CopyWriter</h5>
                                                            </div>
                                                            <div class='row'>
                                                                <div class='col-sm-3'>
                                                                    Design 1<br>
                                                                    <img src='$design1' style='max-width: 100%' alt='No Image'><br>
                                                                    Design 2<br>
                                                                    <img src='$design2' style='max-width: 100%' alt='No Image'><br>
                                                                    Design 3<br>
                                                                    <img src='$design3' style='max-width: 100%' alt='No Image'><br>
                                                                    Design 4<br>
                                                                    <img src='$design4' style='max-width: 100%' alt='No Image'><br>
                                                                    Design 5<br>
                                                                    <img src='$design5' style='max-width: 100%' alt='No Image'><br>
                                                                </div>
                                                                <div class='col-sm-3'>
                                                                    <h6>Description:</h6>
                                                                    Main Topic: $main_topic<br>
                                                                    Sub Topic: $sub_topic<br>
                                                                    Concept: $concept<br>
                                                                    Link Referensi: <a href='$ref_link' target='_blank'>$ref_link</a><br>
                                                                    Notes: $notes<br>
                                                                </div>
                                                                <div class='col-sm-3'>
                                                                    <input type='hidden' name='task_id' value='$task_id'>
                                                                    Caption: <br><textarea name='caption' rows='10' cols='30' class='form-control'>$caption</textarea><br>
                                                                </div>
                                                                <div class='col-sm-3'>
                                                                    Hashtag: <br><textarea name='hashtag' rows='10' cols='30' class='form-control'>$hashtag</textarea><br>
                                                                    <div class='d-grid gap-2 d-md-flex justify-content-md-end'><button class='btn btn-primary'>Submit</button></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>";
                                        }//End Copywriter Echo
                                        else{
                                            echo "<a class='nav-link collapsed' data-toggle='collapse' data-target='#$section_id'
                                                aria-expanded='true' aria-controls='$section_id'>
                                                <i class='fa fa-plus-square'></i>
                                                <span><b>$display_name (SUBMITTED) </b></span>
                                            </a>";
                                        }
                                    }//End Looping Task
                                }//End If Task
                            }//End Looping Client
                            if($client_count == 0){
                                echo "Horray, there's no task for you right now!";
                            }
                        }
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
                require 'footer.php';
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>