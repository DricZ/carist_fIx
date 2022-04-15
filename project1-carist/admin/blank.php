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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia iste error culpa ipsum totam, quidem consequuntur eaque amet ex maiores provident eveniet quasi est fuga praesentium non et qui in?
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

    <!-- Modal Approve -->
    <div class="modal fade" id="approveModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure to APPROVE?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Select "Approve" below if you are sure to approve this task. Any approved task automatically go to next division!
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-success btn-ok">Approve</a>
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
                <label for="comment">Notes:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment">A</textarea>
                Select "Send Revision" below if you are sure to approve this task.
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
                        echo "<optgroup class='contentwriterSelect' label='CONTENT WRITER'>";
                        foreach($contentwriter as $id => $name){
                            echo "<option value='$id' class='contentwriterSelect' disabled>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($contentwriter)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";

                        //Get Designer List
                        echo "<optgroup class='designerSelect' label='DESIGNER'>";
                        foreach($designer as $id => $name){
                            echo "<option value='$id' class='designerSelect' disabled>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($designer)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";

                        //Get CopyWriter List
                        echo "<optgroup class='copywriterSelect' label='COPY WRITER'>";
                        foreach($copywriter as $id => $name){
                            echo "<option value='$id' class='copywriterSelect' disabled>";
                            echo $name;
                            echo "</option>";
                        }
                        if(empty($copywriter)){
                            echo "<option value='0' disabled>NO DATA</option>";
                        }
                        echo "</optgroup>";
                    ?>
                </select><br>
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
        $('#approveModal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        $('#revisionModal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        $('#moveModal').on('show.bs.modal', function(e) {
            var step = $(e.relatedTarget).data('step');
            var classTarget = step + "Select";
            console.log(classTarget);
            $(this).find('.stepInput').attr('value', $(e.relatedTarget).data('step'));
            $(this).find('.taskidInput').attr('value', $(e.relatedTarget).data('taskid'));
            $(this).find("."+$(e.relatedTarget).data('step')+"Select").attr('disabled', false);
            $(this).find('.textPilih').text(step);
        });
    </script>

</body>

</html>