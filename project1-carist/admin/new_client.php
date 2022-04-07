<?php
    require_once 'include.php';
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
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

    <title>New Client</title>

    <style>
        .btn-file {
        position: relative;
        overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            width: 100%;
        }

        .col-8{
            padding: 0;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- SIDEBAR -->
        <?php
            require 'sidebar.php';
        ?>

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
                <nav style="margin-bottom: 30px;">
                    <ol class="cd-breadcrumb triangle custom-icons" style="justify-content:left; display:flex; margin-left: 35px;">
                        <li class="current"><em class="navnc">Brand Information</em></li>
                        <li><a class="navnc" href="./new_client_inv.php">Invoice</a></li>
                    </ol>
                </nav>

                <form method="post" action="sys/add_client.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group" style="margin-left: 40px;padding-right: 20px;">
                                <label class="form-label" for="customFile">Upload To</label>
                                <input type="file" class="form-control" id="customFile" />
                                <img id='img-upload'/>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <label for="inputnama" class="col-form-label">Brand Name: </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="inputnama" name="client" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <label for="inputalamat" class="col-form-label">Address: </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="inputalamat" name="address" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <label for="inputnohp" class="col-form-label">Phone Number: </label>
                                </div>
                                <div class="col-8">
                                    <input type="number" id="inputnohp" name="phone" class="form-control" required>
                                </div>
                            </div><br>

                            <label for="tanggal" aria-hidden="true">Date: </label>
                            <div class="row" style="width: 100%;">
                                <div class="col" style="display: flex; justify-content: center;">
                                    From
                                </div>

                                <div class="col" style="display: flex; justify-content: center;">
                                    To
                                </div>
                            </div>

                            <div class="row" style="width: 100%;">
                                <div class="col" style="display: flex; justify-content: center;">
                                    <input type="date" class="form-control" name="tanggal" name="from" placeholder="tanggal" required="">
                                </div>

                                <div class="col" style="display: flex; justify-content: center;">
                                    <input type="date" class="form-control" name="tanggal" name="to" placeholder="tanggal2" required="">
                                </div>
                            </div><br>
                            
                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <label for="inputig" class="col-form-label">Instagram ID: </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="inputig" class="form-control" name="instagram">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <label for="inputtt" class="col-form-label">Tiktok ID: </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="inputtt" class="form-control" name="tiktok">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <label for="fb" class="col-form-label">Facebook: </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="fb" class="form-control" name="facebook">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <label for="yt" class="col-form-label">Youtube: </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="yt" class="form-control" name="youtube">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-3">
                                    <label for="inputmarkt" class="col-form-label">Marketing: </label>
                                </div>
                                <div class="col-8">
                                    <select id="inputmarkt" class="form-select" name="marketing" required>
                                        <option value="Head" selected>Head</option>
                                        <option value="1">Steven</option>
                                        <option value="2">Victor</option>
                                        <option value="3">Stefany</option>
                                        <option value="4">Nyoto</option>
                                    </select>
                                </div>
                            </div><br>

                            <button type="submit" class="btn btn-primary" style="margin-bottom: 30px;width: 110px;">Submit</button>
                        </div>

                        <div class="col-4">
                            <div class="row g-3 align-items-center">
                                <div class="col-2">
                                    <label for="service" class="col-form-label">Service: </label>
                                </div>
                                <div class="col-8">
                                    <select id="service" class="form-select" name="service" required >
                                        <option value="Service1" selected>Service1</option>
                                        <option value="Service2">Service2</option>
                                        <option value="Service3">Service3</option>
                                    </select>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-2">
                                    <label for="price" class="col-form-label">Price: </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="price" class="form-control" name="price" disabled value="1000000">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-2">
                                    <label for="visit" class="col-form-label">Visit: </label>
                                </div>
                                <div class="col-8">
                                    <input class="form-check-input" type="checkbox" style="position: relative; margin-left: 0" name="visit" value="visit" id="visit">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="notes" class="col-form-label">Notes: </label>
                                </div>
                                <div class="col-8">
                                    <textarea type="text" id="notes" rows="4" name="notes" class="form-control"></textarea>
                                </div>
                            </div><br>
                        </div>
                    </div>
                </form>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

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

		$("#customFile").change(function(){
		    readURL(this);
		}); 	
	});
    </script>

</body>

</html>