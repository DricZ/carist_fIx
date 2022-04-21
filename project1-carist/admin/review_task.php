<?php
    require 'include.php';
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    
    if(!$valid){
        header("Location: ./index.php");
    }
    $my_id = $_SESSION['userid'];

    $contentwriter = array();
    $designer = array();
    $copywriter = array();

    // Get Writer List
    $sql = "SELECT * FROM user WHERE role1 = 'contentwriter' OR role2 = 'contentwriter'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $user_id = $row['user_id'];
            $name = $row['name'];
            $contentwriter += ["$user_id" => "$name"];
        }
    }

    // Get Designer List
    $sql = "SELECT * FROM user WHERE role1 = 'designer' OR role2 = 'designer'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $user_id = $row['user_id'];
            $name = $row['name'];
            $designer += ["$user_id" => "$name"];
        }
    }

    // Get Copywriter List
    $sql = "SELECT * FROM user WHERE role1 = 'copywriter' OR role2 = 'copywriter'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $user_id = $row['user_id'];
            $name = $row['name'];
            $copywriter += ["$user_id" => "$name"];
        }
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Review Task</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Review Task</h1>
                    <?php
                        $sql = "SELECT * FROM user";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $user_id = $row['user_id'];
                                $name = $row['name'];
                                $role1 = $row['role1'];
                                $role2 = $row['role2'];
                                //echo $name."<br>";    //Show All User
                                //Show semua task yang berkaitan dan status nya revision
                                $sql2 = "SELECT * FROM task WHERE (contentwriter_id = '$user_id' AND contentwriter_status = 'review')
                                                            OR (designer_id = '$user_id' AND designer_status = 'review')
                                                            OR (copywriter_id = '$user_id' AND copywriter_status = 'review')";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    echo "<h4>$name ($role1, $role2)</h4>";
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
                                        //Check Flow Step
                                        $contentwriter_status = $row2["contentwriter_status"];
                                        $designer_status = $row2["designer_status"];
                                        $copywriter_status = $row2["copywriter_status"];
                                        if($contentwriter_status == "review"){
                                            $step = "contentwriter";
                                            $nextStep = "designer";
                                        }
                                        if($designer_status == "review"){
                                            $step = "designer";
                                            $nextStep = "copywriter";
                                        }
                                        if($copywriter_status == "review"){
                                            $step = "copywriter";
                                            //setelah copywriter nya klo di approve kemana?
                                        }
                                        echo "<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#$section_id'
                                                aria-expanded='true' aria-controls='$section_id'>
                                                <i class='fa fa-plus-square'></i>
                                                <span><b>$display_name</b></span>
                                            </a>";
                                            echo"<div id='$section_id' class='collapse'>
                                            <div class='bg-gray-200 py-2 collapse-inner rounded' style='padding: 2%; padding-top: 100px'>
                                                <fieldset>
                                                    <div class='row'>
                                                        <h5>Review For $display_name (#$section_id)</h5>
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
                                                            <hr>
                                                            Caption:<br>$caption
                                                            <hr>
                                                            Hashtag:<br>$hashtag
                                                            <hr>
                                                        </div>
                                                        <div class='col-sm-2'>
                                                            <div class='d-grid gap-3'><button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#moveModal' data-step='$step' data-taskid='$task_id'>Move</button></div><br>
                                                        </div>
                                                        <div class='col-sm-2'>
                                                            <div class='d-grid gap-3'><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#revisionModal' data-step='$step' data-taskid='$task_id'>Revision</button></div><br>
                                                        </div>
                                                        <div class='col-sm-2'>";
                                                        if($step == "copywriter"){
                                                            //Approve Only
                                                            echo "<div class='d-grid gap-3'><button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#approveOnlyModal' data-step='$step' data-taskid='$task_id'>Final Approve</button></div><br>";
                                                        }else{
                                                            echo "<div class='d-grid gap-3'><button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#approveModal' data-step='$step' data-nextstep='$nextStep' data-taskid='$task_id'>Approve</button></div><br>";
                                                        }
                                                  echo "</div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>";
                                    }
                                }
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

    <!-- Modal Approve Only -->
    <div class="modal fade" id="approveOnlyModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure to FINAL APPROVE?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form class="approveOnlyForm" method="get" action="sys/approve_final_task.php">
            <!-- Modal body -->
            <div class="modal-body">
                <input type='hidden' name='step' class='stepInput'>
                <input type='hidden' name='task_id' class='taskidInput'>
                Select "Approve" below if you are sure to approve this task. Any approved task automatically go to all client!
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success btn-ok">Approve</button>
            </form>
            </div>

            </div>
        </div>
    </div>

    <!-- Modal Approve -->
    <div class="modal fade" id="approveModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure to APPROVE?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form class="approveForm" method="get" action="sys/approve_task.php">
            <!-- Modal body -->
            <div class="modal-body">
                <input type='hidden' name='step' class='stepInput'>
                <input type='hidden' name='nextstep' class='nextstepInput'>
                <input type='hidden' name='task_id' class='taskidInput'>
                <label for="approveto">Approve and assign to <span class='textPilih'>TASK STEP</span></label>: <br>
                <select id="approveto" name="approveto" class="form-select" required>
                    <?php
                        //Get Writer List
                        //echo "<optgroup class='contentwriterSelect' label='CONTENT WRITER'>";
                        foreach($contentwriter as $id => $name){
                            echo "<option value='$id' class='contentwriterSelect' hidden>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($contentwriter)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";

                        //Get Designer List
                        //echo "<optgroup class='designerSelect' label='DESIGNER'>";
                        foreach($designer as $id => $name){
                            echo "<option value='$id' class='designerSelect' hidden>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($designer)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";

                        //Get CopyWriter List
                        //echo "<optgroup class='copywriterSelect' label='COPY WRITER'>";
                        foreach($copywriter as $id => $name){
                            echo "<option value='$id' class='copywriterSelect' hidden>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($copywriter)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";
                    ?>
                </select>
                Select "Approve" below if you are sure to approve this task. Any approved task automatically go to next division!
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success btn-ok">Approve</button>
            </form>
            </div>

            </div>
        </div>
    </div>

    <!-- Modal Revision -->
    <div class="modal fade" id="revisionModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure to give REVISION?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="revisionForm" method="get" action="sys/revision_task.php">
                <input type='hidden' name='step' class='stepInput'>
                <input type='hidden' name='task_id' class='taskidInput'>
                <label for="notes">Notes:</label>
                <textarea class="form-control" rows="5" id="notes" name="notes" required></textarea>
                Select "Send Revision" below if you are sure to RETURN this task.
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-warning btn-ok">Send Revision</button>
                </form>
            </div>

            </div>
        </div>
    </div>

    <!-- Modal Move -->
    <div class="modal fade" id="moveModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Please select who will resume this task!</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form class="moveForm" method="get" action="sys/move_task.php">
            <!-- Modal body -->
            <div class="modal-body">
                <input type='hidden' name='step' class='stepInput'>
                <input type='hidden' name='task_id' class='taskidInput'>
                <label for="moveto">Move to <span class='textPilih'>TASK STEP</span></label>: <br>
                <select id="moveto" name="moveto" class="form-select" required>
                    <?php
                        //Get Writer List
                        //echo "<optgroup class='contentwriterSelect' label='CONTENT WRITER'>";
                        foreach($contentwriter as $id => $name){
                            echo "<option value='$id' class='contentwriterSelect' hidden>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($contentwriter)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";

                        //Get Designer List
                        //echo "<optgroup class='designerSelect' label='DESIGNER'>";
                        foreach($designer as $id => $name){
                            echo "<option value='$id' class='designerSelect' hidden>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($designer)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";

                        //Get CopyWriter List
                        //echo "<optgroup class='copywriterSelect' label='COPY WRITER'>";
                        foreach($copywriter as $id => $name){
                            echo "<option value='$id' class='copywriterSelect' hidden>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($copywriter)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";
                    ?>
                </select>
                Select "Move" below if you are sure to move this task.
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-ok">Move</button>
            </div>
            </form>

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

    <!-- Modal Data -->
    <script>
        $('#approveOnlyModal').on('show.bs.modal', function(e) {
            var step = $(e.relatedTarget).data('step');
            $(this).find('.stepInput').attr('value', $(e.relatedTarget).data('step'));
            $(this).find('.taskidInput').attr('value', $(e.relatedTarget).data('taskid'));
        });
        $('#approveModal').on('show.bs.modal', function(e) {
            var step = $(e.relatedTarget).data('step');
            var nextstep = $(e.relatedTarget).data('nextstep');
            var classTarget = nextstep + "Select";
            $(this).find('.stepInput').attr('value', $(e.relatedTarget).data('step'));
            $(this).find('.nextstepInput').attr('value', $(e.relatedTarget).data('nextstep'));
            $(this).find('.taskidInput').attr('value', $(e.relatedTarget).data('taskid'));
            $(this).find("."+$(e.relatedTarget).data('nextstep')+"Select").attr('hidden', false);
            $(this).find('.textPilih').text(nextstep);
        });
        $('#revisionModal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            var step = $(e.relatedTarget).data('step');
            $(this).find('.stepInput').attr('value', $(e.relatedTarget).data('step'));
            $(this).find('.taskidInput').attr('value', $(e.relatedTarget).data('taskid'));
        });
        $('#moveModal').on('show.bs.modal', function(e) {
            var step = $(e.relatedTarget).data('step');
            var classTarget = step + "Select";
            $(this).find('.stepInput').attr('value', $(e.relatedTarget).data('step'));
            $(this).find('.taskidInput').attr('value', $(e.relatedTarget).data('taskid'));
            $(this).find("."+$(e.relatedTarget).data('step')+"Select").attr('hidden', false);
            $(this).find('.textPilih').text(step);
        });
    </script>

</body>

</html>