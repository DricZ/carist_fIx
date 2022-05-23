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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="row" style="padding-left: 40px;padding-right: 40px;">
                    <div class="col" style="padding-left: 30px;">
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

                    <div class="col" style="display: grid; justify-content: right; padding-right: 30px;">
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

                    <p style="margin: 0; margin-top: 20px; padding-left: 30px;">Waru, Sidoarjo</p>
                    <p style="margin: 0; padding-left: 30px;">61256</p>
                    <div class="row" style="padding-left: 30px;padding-right: 20px;">
                        <div class="col">
                            <p style="margin: 0;">+62 819 5152 001</p>
                        </div>
                        <div class="col" style="display: grid; justify-content: right; padding:0">
                            <p style="margin: 0; text-align: right;">To: <?=$name?></p>
                        </div>
                    </div>

                    <table class="table table-borderless table-responsive-md invtb">
                        <tbody>
                            <?php
                                $total = 0;
                                $ids = 0;
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
                                        $ids += 1;
                            ?>
                            <tr>
                                <td class="svc-<?=$ids?>" style="text-align: left;padding: 30px;padding-bottom: 10px; padding-top: 10px;"><?=$service_name?></td>
                                <td></td>
                                <td></td>
                                <td class="svc-<?=$ids?>" style="text-align: right;padding: 30px;padding-bottom: 10px; padding-top: 10px; padding-left: 0;">Rp. <?=$disp_price?></td>
                            </tr>
                            <?php
                                    }
                                }
                                $disp_total = number_format($total,0,",",".");
                            ?>
                            <tr>
                                <td colspan="4" style="padding-bottom: 0px;padding-left: 30px;padding-right: 30px;">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="text-align: right;padding: 30px;padding-bottom: 30px; padding-top:10px">Total</td>
                                <td style="text-align: right;width: 15%;padding: 30px;padding-bottom: 30px; padding-top:10px; padding-left: 0;">Rp. <?=$disp_total?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row mb-2">
                        <div class="col-4" style="padding-left: 30px;">
                            <label for="notes">Notes: </label>
                            <textarea class="form-control" id="notes" rows="5" cols="2" name="notes"></textarea>
                        </div>

                        <div class="col-8" style="justify-content: right;display: flex;padding-top: 20px;padding-bottom: 20px;padding-right: 20px;">
                            <img src="./img/qr-crop.jpg" style="width: 25%;">
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
        $(document).ready(function () {
            window.print();
        });
    </script>

</body>

</html>