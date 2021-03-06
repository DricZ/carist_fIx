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

    <title>Client List</title>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Client List</h1>
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
                                $section_id = "client" . $client_id;
                                echo "<div class='row'>
                                        <div class='col-md-4'>
                                            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#$section_id'
                                                aria-expanded='true' aria-controls='$section_id'>
                                                <i class='fa fa-plus-square'></i>
                                                <span><b>$client_name</b></span>
                                            </a>
                                        </div>
                                        <div class='col-md-2'>
                                            <a style='text-align: right;' href='./new_client_inv.php?id=$client_id' target='_blank'>Check Invoice</a>
                                        </div>
                                    </div>";
                                    echo"<div id='$section_id' class='collapse'>
                                            <div class='row'>
                                                
                                                <div class='col-md-12' style='padding-left: 30px;'>
                                                    <!-- SELURUH TASK -->";
                                                    //Search All Task with that client ID
                                                    $sql2 = "SELECT * FROM task WHERE client_id = $client_id";
                                                    $result2 = $conn->query($sql2);
                                                    if ($result2->num_rows > 0) {
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
                                                            $contentwriter_id = $row2["contentwriter_id"];
                                                            $designer_status = $row2["designer_status"];
                                                            $copywriter_status = $row2["copywriter_status"];
                                                            if($copywriter_status == "pending"){
                                                                $step = "Copy Writer";
                                                            }
                                                            if($designer_status == "pending"){
                                                                $step = "Designer";
                                                            }
                                                            if($contentwriter_status == "pending"){
                                                                $step = "Content Writer";
                                                                if($contentwriter_id == 0){
                                                                    $step = "-";
                                                                }
                                                            }
                                                            echo "<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#$section_id'
                                                                aria-expanded='true' aria-controls='$section_id'>
                                                                <i class='fa fa-plus-square'></i>
                                                                <span><b>$display_name ($step)</b></span>
                                                            </a>";
                                                            echo"<div id='$section_id' class='collapse'>
                                                                <div class='bg-gray-200 py-2 collapse-inner rounded' style='padding: 2%; padding-top: 100px'>
                                                                    <form method='post' action='sys/submit_copywriter.php' enctype='multipart/form-data'>
                                                                        <fieldset>
                                                                            <div class='row'>
                                                                                <h5>Task Detail For $display_name (#$section_id) CopyWriter</h5>
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
                                                                                    Caption:<br> $caption
                                                                                </div>
                                                                                <div class='col-sm-3'>
                                                                                    Hashtag:<br> $hashtag
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </form>
                                                                </div>
                                                            </div>";
                                                        }
                                                    }else{
                                                        echo "No Task for this client";
                                                    }
                                        echo "</div>
                                        </div>
                                    </div>";
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
                        <span aria-hidden="true">??</span>
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