<?php
    require_once 'include.php';
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
    }

    if(!isset($_GET['id'])){
        echo "<script>
            alert('Please select client first!');
            //window.location = './new_client.php';
        </script>";
        //header("Location: ./new_client.php");
    }

    $client_id = $_GET['id'];

    $sql = "SELECT * FROM client WHERE client_id=$client_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $no = 1;
        while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $logo = $row['client_logo'];
            $address = $row['address'];
            $phone = $row['phone'];
            $input_date = $row['input_date'];
            $paid_date = $row['paid_date'];

            $date=date_create($input_date);
            $disp_date = date_format($date,"j F Y");
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

    <title>New Client - Invoice</title>
    
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
                        <li><a class="navnc" href="./new_client.php?id=<?=$client_id?>"><em class="navnc">Brand Information</em></a></li>
                        <li class="current"><em class="navnc">Invoice</em></li>
                    </ol>
                </nav>

                <div class="row" style="padding-left: 40px;padding-right: 40px;">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="./img/carist only cropped.png" style="width: 100px;">
                            </div>

                            <div class="col-md-8" style="display: table;">
                                <div class="row" style="display: table-cell; vertical-align: bottom;">
                                    <div class="col">
                                        <p style="margin-bottom: 0; font-size:20px; font-weight: bold;">CARIST</p>
                                        <p style="margin-bottom: 0; font-size:20px; font-weight: bold;">CORPORATION</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" style="display: grid; justify-content: right; padding-right: 20px;">
                        <div class="row" style="height: 5px;">
                            <div class="col">
                                <p style="text-align: right; font-size: 20px"><b>INVOICE</b></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p><?=$disp_date?></p>
                            </div>
                        </div>
                    </div>

                    <p style="margin: 0; margin-top: 20px">Waru, Sidoarjo</p>
                    <p style="margin: 0;">61256</p>
                    <div class="row">
                        <div class="col">
                            <p style="margin: 0;">+62 819 5152 001</p>
                        </div>
                        <div class="col" style="display: grid; justify-content: right; padding:0">
                            <p style="margin: 0; text-align: right;">To: <?=$name?></p>
                        </div>
                    </div>

                    <div class="row" style="border: 2px solid;padding: 20px;margin-left: 10px; margin-top: 20px; width: 98%;">
                        <div class="col">
                            <?php
                                $total = 0;
                                $sql = "SELECT * FROM service WHERE client_id=$client_id";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $no = 1;
                                    while($row = $result->fetch_assoc()) {
                                        $service_name = $row['service_name'];
                                        $price = $row['price'];
                                        $disp_price = number_format($price,0,",",".");
                                        $total += $price;
                            ?>
                            <div class="row">
                                <div class="col-md-7">
                                    <p><?=$service_name?></p>
                                </div>

                                <div class="col-md-2">

                                </div>

                                <div class="col-md-3">
                                    <p style="text-align: right;">Rp. <?=$disp_price?></p>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                                $disp_total = number_format($total,0,",",".");
                            ?>

                            

                            <hr/>

                            <div class="row">
                                <div class="col-md-8">

                                </div>

                                <div class="col-md-1">
                                    <p style="text-align: right;">Total: </p>
                                </div>

                                <div class="col-md-3">
                                    <p style="text-align: right;">Rp. <?=$disp_total?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center mb-2">
                            <label for="notes" class="col-form-label">Notes: </label>
                        <div class="col-4 mt-0">
                            <textarea type="text" id="notes" rows="5" name="notes" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row mb-5" style="display: grid; justify-content: right;">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">SEND</button>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>