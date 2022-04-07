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
                        <li><a class="navnc" href="#0">Invoice</a></li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-2">

                    </div>

                    <div class="col-5">
                        <form class="">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputnama" class="col-form-label">Nama Brand: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputnama" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputalamat" class="col-form-label">Alamat: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputalamat" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputnohp" class="col-form-label">Nomor Handphone: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputnohp" class="form-control" required>
                                </div>
                            </div><br>

                            <label for="tanggal" aria-hidden="true">Tanggal: </label>
                            <div class="row" style="width: 70%;">
                                <div class="col" style="display: flex; justify-content: center;">
                                    From
                                </div>

                                <div class="col" style="display: flex; justify-content: center;">
                                    To
                                </div>
                            </div>

                            <div class="row" style="width: 70%;">
                                <div class="col" style="display: flex; justify-content: center;">
                                    <input type="date" name="tanggal" placeholder="tanggal" required="">
                                </div>

                                <div class="col" style="display: flex; justify-content: center;">
                                    <input type="date" name="tanggal" placeholder="tanggal2" required="">
                                </div>
                            </div><br>
                            
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputig" class="col-form-label">Instagram ID: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputig" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputtt" class="col-form-label">Tiktok ID: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputtt" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputmarkt" class="col-form-label">Marketing: </label>
                                </div>
                                <div class="col-6">
                                    <select id="inputmarkt" class="form-select" required>
                                        <option>Pilihan</option>
                                        <option>Anu</option>
                                    </select>
                                </div>
                            </div><br>

                            <button type="submit" class="btn btn-primary" style="margin-bottom: 30px;">Submit</button>

                        </form>
                    </div>

                    <div class="col-5">
                        <form>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="service" class="col-form-label">Service: </label>
                                </div>
                                <div class="col-6">
                                    <select id="service" class="form-select" required>
                                        <option>Pilihan</option>
                                        <option>Anu</option>
                                    </select>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="price" class="col-form-label">Price: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="price" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="notes" class="col-form-label">Notes: </label>
                                </div>
                                <div class="col-8">
                                    <textarea type="text" id="notes" class="form-control"></textarea>
                                </div>
                            </div><br>
                        </form>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>