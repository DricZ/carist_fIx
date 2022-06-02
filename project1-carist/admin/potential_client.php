<?php
    require 'include.php';
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    
    if(!$valid){
        header("Location: ./index.php");
    }
    $my_id = $_SESSION['userid'];

    $this_month = date('n');
    $this_year = date('Y');
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Potential Client</title>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-4 text-gray-800">Potential Client</h1>

                    <!-- Input Client -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Input Client</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <form method="post" action="./sys/submit_potential_client.php" enctype='multipart/form-data'>
                                    <div class="col">
                                        <div class="row">
                                            Nama Brand <input type="text" class="form-control" name="nama_brand" required>
                                        </div>
                                        <br>
                                        <div class="row">
                                            Instagram <input type="text" class="form-control" name="instagram" required>
                                        </div>
                                        <br>
                                        <div class="row">
                                            WhatsApp <input type="text" class="form-control" name="whatsapp">
                                        </div>
                                        <br>
                                        <div class="row">
                                            Line <input type="text" class="form-control" name="line">
                                        </div>
                                        <br>
                                        <div class="row">
                                            Penawaran
                                            <select class="form-select" name="penawaran" required>
                                                <option hidden disabled selected value> -- select an option -- </option>
                                                <option value="Branding">Branding</option>
                                                <option value="Social Media">Social Media</option>
                                                <option value="Video Production">Video Production</option>
                                                <option value="Photo">Photo</option>
                                                <option value="Music Production">Music Production</option>
                                                <option value="Website">Website</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="row">
                                            Keterangan
                                            <select class="form-select" name="keterangan" required>
                                                <option hidden disabled selected value> -- select an option -- </option>
                                                <option value="Sudah memiliki tim sendiri">Sudah memiliki tim sendiri</option>
                                                <option value="Tidak dibalas, sudah dibaca">Tidak dibalas, sudah dibaca</option>
                                                <option value="Tidak dibalas, tidak dibaca">Tidak dibalas, tidak dibaca</option>
                                                <option value="Masih di diskusikan dengan tim">Masih di diskusikan dengan tim</option>
                                                <option value="Ditolak">Ditolak</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="row">
                                            Brand Partner <input type="text" class="form-control" name="brand_partner">
                                        </div>
                                        <br>
                                        <div class="row">
                                            Instagram Partner <input type="text" class="form-control" name="instagram_partner">
                                        </div>
                                        <br>
                                        <div class="row">
                                            Contact 
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1" name="contact" value="WhatsApp" checked>
                                                <label class="form-check-label" for="radio1">WhatsApp</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="contact" value="DM">
                                                <label class="form-check-label" for="radio2">DM</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="contact" value="Line">
                                                <label class="form-check-label" for="radio2">Line</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            Upload Bukti Chat:
                                            <input type='file' name='bukti' id='bukti' class='form-control' required>
                                        </div>
                                        <br>
                                        <div class='d-grid gap-2 d-md-flex justify-content-md'>
                                            <button type="submit" class='btn btn-primary'>Submit</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                        <!-- Col 2 -->
                        <div class="col-md-6">
                            <!-- Leaderboard -->
                            <div class="row-md-6">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Leaderboard</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <!-- Leaderboard -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="leaderboard" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Rank</th>
                                                        <th>Nama</th>
                                                        <th>Input</th>
                                                        <th>Target</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no = 1;
                                                        $sql = "SELECT user.user_id, user.name, COUNT(nama_brand) AS input
                                                        FROM `potential_client`
                                                        LEFT JOIN user ON potential_client.sales_id = user.user_id
                                                        WHERE potential_client.id IN (SELECT id FROM `potential_client` WHERE EXTRACT(MONTH FROM tanggal) = '$this_month' AND EXTRACT(YEAR FROM tanggal) = '$this_year')
                                                        GROUP BY sales_id
                                                        ORDER BY COUNT(nama_brand) DESC;";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                $id = $row['user_id'];
                                                                $name = $row['name'];
                                                                $input = $row['input'];
                                                                echo "<td>$no</td>";
                                                                $no++;
                                                                echo "<td>$name</td>";
                                                                echo "<td>$input</td>";
                                                                echo "<td>250</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Report -->
                            <div class="row-md-6">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Monthly Report</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <form id="monthlyreport">
                                            <div class="input-group">
                                                <span class="input-group-text">See Monthly Report for</span>
                                                <!-- <span class="input-group-text">Month</span> -->
                                                <select class="form-select" id="monthselect" name="month">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                                <!-- <span class="input-group-text">Year</span> -->
                                                <select class="form-select" id="yearselect" name="year">
                                                    <option value="2022">2022</option>
                                                </select>
                                                <!-- <input type="submit" value="Update" class="btn btn-primary"/> -->
                                            </div>
                                        </form>
                                        <br>
                                        <div id="month_report">
                                            <!-- Monthly Report -->
                                            <div class="table-responsive">
                                            <table class="table table-bordered" id="leaderboard" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Rank</th>
                                                        <th>Nama</th>
                                                        <th>Input</th>
                                                        <th>Target</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no = 1;
                                                        $sql = "SELECT user.user_id, user.name, COUNT(nama_brand) AS input
                                                        FROM `potential_client`
                                                        LEFT JOIN user ON potential_client.sales_id = user.user_id
                                                        WHERE potential_client.id IN (SELECT id FROM `potential_client` WHERE EXTRACT(MONTH FROM tanggal) = '$this_month' AND EXTRACT(YEAR FROM tanggal) = '$this_year')
                                                        GROUP BY sales_id
                                                        ORDER BY COUNT(nama_brand) DESC;";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                $id = $row['user_id'];
                                                                $name = $row['name'];
                                                                $input = $row['input'];
                                                                echo "<td>$no</td>";
                                                                $no++;
                                                                echo "<td>$name</td>";
                                                                echo "<td>$input</td>";
                                                                echo "<td>250</td>";
                                                                echo "</tr>";
                                                            }
                                                        }else{
                                                            echo "<tr><td colspan=4><center>No Data</center></td></tr>";
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Potential Client -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Potential Client</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Brand Name</th>
                                                    <th>Instagram</th>
                                                    <th>WhatsApp</th>
                                                    <th>Line</th>
                                                    <th>Contact</th>
                                                    <th>Penawaran</th>
                                                    <th>Keterangan</th>
                                                    <th>Tanggal Input</th>
                                                    <th>Brand Partner</th>
                                                    <th>Instagram Partner</th>
                                                    <th>Sales</th>
                                                    <?php
                                                        if($headAccess || $my_id == "33"){
                                                            $see_bukti = true;
                                                        }else{
                                                            $see_bukti = false;
                                                        }

                                                        if($see_bukti){
                                                    ?>
                                                    <th>Bukti Chat</th>
                                                    <?php
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = "SELECT potential_client.*, user.name AS nama_sales
                                                    FROM `potential_client`
                                                    LEFT JOIN user ON potential_client.sales_id = user.user_id
                                                    WHERE potential_client.id IN (SELECT id FROM `potential_client` WHERE EXTRACT(MONTH FROM tanggal) = '$this_month' AND EXTRACT(YEAR FROM tanggal) = '$this_year')
                                                    ORDER BY id DESC";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        $no = 1;
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            $id = $row['id'];
                                                            $nama_brand = $row['nama_brand'];
                                                            $instagram = $row['instagram'];
                                                            $whatsapp = $row['whatsapp'];
                                                            $line = $row['line'];
                                                            $contact = $row['contact'];
                                                            $penawaran = $row['penawaran'];
                                                            $keterangan = $row['keterangan'];
                                                            $tanggal = $row['tanggal'];
                                                            $brand_partner = $row['brand_partner'];
                                                            $instagram_partner = $row['instagram_partner'];
                                                            $sales = $row['nama_sales'];
                                                            $bukti = $row['bukti'];
                                                            $bukti_url = "../drive/bukti_marketing/" . $bukti; 
                                                            echo "<td>$no</td>";
                                                            $no++;
                                                            echo "<td>$nama_brand</td>";
                                                            echo "<td>$instagram</td>";
                                                            echo "<td>$whatsapp</td>";
                                                            echo "<td>$line</td>";
                                                            echo "<td>$contact</td>";
                                                            echo "<td>$penawaran</td>";
                                                            echo "<td>$keterangan</td>";
                                                            echo "<td>$tanggal</td>";
                                                            echo "<td>$brand_partner</td>";
                                                            echo "<td>$instagram_partner</td>";
                                                            echo "<td>$sales</td>";
                                                            
                                                            if($see_bukti){
                                                                echo "<td><a href='https://life.carist.id/drive/bukti_marketing/$bukti' target='_blank'><img src='$bukti_url' alt='$bukti' class='buktichat' style='max-width: 200px'></a></td>";
                                                            }
                                                            
                                                            echo "</tr>";
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

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
        $( document ).ready(function() {
            var request;
            // Bind to the submit event of our form
            $("#monthlyreport").change(function(event){

                // Prevent default posting of form - put here to work in case of errors
                event.preventDefault();

                // Abort any pending request
                if (request) {
                    request.abort();
                }
                // setup some local variables
                var $form = $(this);

                // Let's select and cache all the fields
                var $inputs = $form.find("input, select, button, textarea");

                // Serialize the data in the form
                var serializedData = $form.serialize();

                // Let's disable the inputs for the duration of the Ajax request.
                // Note: we disable elements AFTER the form data has been serialized.
                // Disabled form elements will not be serialized.
                $inputs.prop("disabled", true);

                // Fire off the request to /form.php
                request = $.ajax({
                    url: "./sys/monthly_report.php",
                    type: "post",
                    data: serializedData
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR){
                    // Log a message to the console
                    console.log("Hooray, it worked!");
                    console.log(response);
                    $('#month_report').html(response);
                });

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown){
                    // Log the error to the console
                    console.error(
                        "The following error occurred: "+
                        textStatus, errorThrown
                    );
                });

                // Callback handler that will be called regardless
                // if the request failed or succeeded
                request.always(function () {
                    // Reenable the inputs
                    $inputs.prop("disabled", false);
                });

            }); //Monthly Report End

            //Change default month and year
            $("#monthselect").val("<?=$this_month?>");
            $("#yearselect").val("<?=$this_year?>");
        });
        
    </script>

<?php
    if(isset($_GET['update'])){
        echo "<script>alert('Update profile success !!');</script>";
    }
?>

</body>

</html>