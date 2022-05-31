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

    <title>My Profile</title>

    <style>
        .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }
        .kv-avatar {
            display: inline-block;
        }
        .kv-avatar .file-input {
            display: table-cell;
            width: 213px;
        }
        .kv-reqd {
            color: red;
            font-family: monospace;
            font-weight: normal;
        }

        #img-upload{
            width: 100%;
        }
</style>

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
                    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
                    <?php
                        $sql = "SELECT * FROM user WHERE user_id = $my_id AND status = 'active'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $user_id = $row['user_id'];
                                $name = $row['name'];
                                $role1 = $row['role1'];
                                $role2 = $row['role2'];
                                $pass = $row['pass'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $city = $row['city'];
                                $address = $row['address'];
                                $birthday = $row['birthday'];
                                $instagram = $row['instagram'];
                                $tiktok = $row['tiktok'];
                            }
                        }
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form method="post" action="sys/update_profile.php" enctype="multipart/form-data">
                                        <!-- File Upload -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group" style="padding-right: 20px;">
                                                    <label class="form-label" for="avatar-1">Upload</label>
                                                    <input type="file" class="form-control" name="avatar-1" id="avatar-1" style="margin-bottom: 20px;" />
                                                    <img id='img-upload'/>
                                                </div>
                                            </div>
                                            

                                            <!-- <div class="kv-avatar">
                                                <div class="file-loading">
                                                    <input id="avatar-1" name="avatar-1" type="file" required>
                                                </div>
                                            </div>
                                            <div class="kv-avatar-hint">
                                                <small>Select file < 1500 KB</small>
                                            </div> -->
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-1">
                                                <label class="form-label mt-1" for="name">Name</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="name" id="name" value="<?=$name?>">
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-1">
                                                <label class="form-label mt-1" for="birthday">Birthday</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control" name="birthday" id="birthday" value="<?=$birthday?>">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-1">
                                                <label class="form-label mt-1" for="name">Email</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="email" id="email" value="<?=$email?>">
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-1">
                                                <label class="form-label mt-1" for="instagram">Instagram</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="instagram" id="instagram" value="<?=$instagram?>">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-1">
                                                <label class="form-label mt-1" for="phone">Phone</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="phone" id="phone" value="<?=$phone?>">
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-1">
                                                <label class="form-label mt-1" for="tiktok">TikTok</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tiktok" id="tiktok" value="<?=$tiktok?>">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-1">
                                                <label class="form-label mt-1" for="city">City</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="city" id="city" value="<?=$city?>">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-1">
                                                <label class="form-label mt-1" for="address">Address</label>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea class="form-control" rows="5" id="address" name="address"><?=$address?></textarea>
                                            </div>
                                        </div>
                                        <div class='d-grid gap-2 d-md-flex justify-content-md-end'><button class='btn btn-primary'>Update</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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

    <!-- the fileinput plugin initialization -->
    <script>
        var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="bi-tag"></i>' +
            '</button>'; 
        $("#avatar-1").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="bi-folder2-open"></i>',
            removeIcon: '<i class="bi-x-lg"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="/drive/" alt="Your Avatar">',
            layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>

    <script>
        $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#avatar-1").change(function(){
		    readURL(this);
		});

        });
    </script>

<?php
    if(isset($_GET['update'])){
        echo "<script>alert('Update profile success !!');</script>";
    }
?>

</body>

</html>