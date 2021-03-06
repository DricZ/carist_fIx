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

    <title>User List</title>

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
                    <h1 class="h3 mb-4 text-gray-800">User List</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All User</h6>
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
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Role 1</th>
                                                    <th>Role 2</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>City</th>
                                                    <th>Address</th>
                                                    <th>Birthday</th>
                                                    <th>Instagram</th>
                                                    <th>TikTok</th>
                                                    <th>Accept as</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = "SELECT * FROM user WHERE name NOT LIKE '%demo%'";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        $no = 1;
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            $user_id = $row['user_id'];
                                                            $username = $row['username'];
                                                            $name = $row['name'];
                                                            $role1 = $row['role1'];
                                                            $role2 = $row['role2'];
                                                            $email = $row['email'];
                                                            $phone = $row['phone'];
                                                            $city = $row['city'];
                                                            $address = $row['address'];
                                                            $birthday = $row['birthday'];
                                                            $instagram = $row['instagram'];
                                                            $tiktok = $row['tiktok'];
                                                            $status = $row['status'];
                                                            echo "<td>$no</td>";
                                                            $no++;
                                                            echo "<td>$username</td>";
                                                            echo "<td>$name</td>";
                                                            echo "<td>$role1</td>";
                                                            echo "<td>$role2</td>";
                                                            echo "<td>$email</td>";
                                                            echo "<td>$phone</td>";
                                                            echo "<td>$city</td>";
                                                            echo "<td>$address</td>";
                                                            echo "<td>$birthday</td>";
                                                            echo "<td>$instagram</td>";
                                                            echo "<td>$tiktok</td>";
                                                            echo "<td>";
                                                            if($status == "pending"){
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=contentwriter'><button type='submit' class='btn btn-primary'>ContentWriter</button></a> ";
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=designer'><button type='submit' class='btn btn-primary'>Designer</button></a> ";
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=copywriter'><button type='submit' class='btn btn-primary'>CopyWriter</button></a> ";
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=multimedia'><button type='submit' class='btn btn-warning'>Multimedia</button></a> ";
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=contentcreator'><button type='submit' class='btn btn-warning'>Content Creator</button></a> ";
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=it'><button type='submit' class='btn btn-warning'>IT</button></a> ";
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=marketing'><button type='submit' class='btn btn-warning'>Marketing</button></a> ";
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=operational'><button type='submit' class='btn btn-danger'>Manager Operational</button></a> ";
                                                                echo "<a href='./sys/approve_user.php?id=$user_id&role=head'><button type='submit' class='btn btn-danger'>Head</button></a> ";
                                                            }
                                                            echo "</td>";
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
    </script>

<?php
    if(isset($_GET['update'])){
        echo "<script>alert('Update profile success !!');</script>";
    }
?>

</body>

</html>