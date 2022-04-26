<?php
    require_once 'include.php';
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
    }

    // Get Writer List
    $client = array();
    $contentwriter = array();

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

    $sql = "SELECT * FROM user WHERE status='pending'";
    $result = $conn->query($sql);
    $pendingUser = $result->num_rows;

    $sql = "SELECT * FROM user WHERE status='active' AND name NOT LIKE '%demo%'";
    $result = $conn->query($sql);
    $activeUser = $result->num_rows;

    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
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

                <?php
                    require 'sidebar_button.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

<?php 
    if($adminAccess || $headAccess){
?>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Total Active User Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Active User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$activeUser?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending User Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$pendingUser?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row Dashboard -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Progress List</h6>
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
                                                    <th>Client</th>
                                                    <th>Feed (Completed)</th>
                                                    <th>Story (Completed)</th>
                                                    <th>Reels (Completed)</th>
                                                    <th>TikTok (Completed)</th>
                                                    <th>Visit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php
                                                    $sql = "SELECT * FROM client";
                                                    $result = $conn->query($sql);
                                                    $total_client = $result->num_rows;

                                                    if ($result->num_rows > 0) {
                                                    // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            $client_id = $row["client_id"];
                                                            $client_name = $row["name"];
                                                            $client_logo = $row["client_logo"];
                                                            $visit = $row["visit"];
                                                            $client += ["$client_id" => "$client_name"];
                                                            //Hitung jumlah feed, story untuk tiap client
                                                            //Total Tasks
                                                            //Feed
                                                            $feed = 0;
                                                            $sql2 = "SELECT COUNT(content_type) as feed
                                                                    FROM task
                                                                    WHERE content_type = 'feed' AND client_id = $client_id;";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2->num_rows > 0){
                                                                while($row2 = $result2->fetch_assoc()) {
                                                                    $feed = $row2['feed'];
                                                                }
                                                            }else{
                                                                $feed = 'DATA NOT FOUND';
                                                            }
                                                            //Story
                                                            $story = 0;
                                                            $sql2 = "SELECT COUNT(content_type) as story
                                                                    FROM task
                                                                    WHERE content_type = 'story' AND client_id = $client_id;";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2->num_rows > 0){
                                                                while($row2 = $result2->fetch_assoc()) {
                                                                    $story = $row2['story'];
                                                                }
                                                            }else{
                                                                $story = 'DATA NOT FOUND';
                                                            }
                                                            //Reels
                                                            $reels = 0;
                                                            $sql2 = "SELECT COUNT(content_type) as reels
                                                                    FROM task
                                                                    WHERE content_type = 'reels' AND client_id = $client_id;";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2->num_rows > 0){
                                                                while($row2 = $result2->fetch_assoc()) {
                                                                    $reels = $row2['reels'];
                                                                }
                                                            }else{
                                                                $reels = 'DATA NOT FOUND';
                                                            }
                                                            //TikTok
                                                            $tiktok = 0;
                                                            $sql2 = "SELECT COUNT(content_type) as tiktok
                                                                    FROM task
                                                                    WHERE content_type = 'tiktok' AND client_id = $client_id;";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2->num_rows > 0){
                                                                while($row2 = $result2->fetch_assoc()) {
                                                                    $tiktok = $row2['tiktok'];
                                                                }
                                                            }else{
                                                                $tiktok = 'DATA NOT FOUND';
                                                            }
                                                            //Done Tasks
                                                            //Feed
                                                            $feedDone = 0;
                                                            $sql2 = "SELECT COUNT(content_type) as feed
                                                                    FROM task
                                                                    WHERE content_type = 'feed' AND client_id = $client_id AND copywriter_status = 'done';";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2->num_rows > 0){
                                                                while($row2 = $result2->fetch_assoc()) {
                                                                    $feedDone = $row2['feed'];
                                                                }
                                                            }else{
                                                                $feedDone = 'DATA NOT FOUND';
                                                            }
                                                            //Story
                                                            $storyDone = 0;
                                                            $sql2 = "SELECT COUNT(content_type) as story
                                                                    FROM task
                                                                    WHERE content_type = 'story' AND client_id = $client_id  AND copywriter_status = 'done';";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2->num_rows > 0){
                                                                while($row2 = $result2->fetch_assoc()) {
                                                                    $storyDone = $row2['story'];
                                                                }
                                                            }else{
                                                                $storyDone = 'DATA NOT FOUND';
                                                            }
                                                            //Reels
                                                            $reelsDone = 0;
                                                            $sql2 = "SELECT COUNT(content_type) as reels
                                                                    FROM task
                                                                    WHERE content_type = 'reels' AND client_id = $client_id;";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2->num_rows > 0){
                                                                while($row2 = $result2->fetch_assoc()) {
                                                                    $reelsDone = $row2['reels'];
                                                                }
                                                            }else{
                                                                $reelsDone = 'DATA NOT FOUND';
                                                            }
                                                            //TikTok
                                                            $tiktokDone = 0;
                                                            $sql2 = "SELECT COUNT(content_type) as tiktok
                                                                    FROM task
                                                                    WHERE content_type = 'tiktok' AND client_id = $client_id;";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2->num_rows > 0){
                                                                while($row2 = $result2->fetch_assoc()) {
                                                                    $tiktokDone = $row2['tiktok'];
                                                                }
                                                            }else{
                                                                $tiktokDone = 'DATA NOT FOUND';
                                                            }

                                                            //PRINT DATA
                                                            echo "<tr>";
                                                            echo "<td>$client_name</td>";
                                                            echo "<td>$feedDone/$feed</td>";
                                                            echo "<td>$storyDone/$story</td>";
                                                            echo "<td>$reelsDone/$reels</td>";
                                                            echo "<td>$tiktokDone/$tiktok</td>";
                                                            if($visit == 1){
                                                                echo "<td>Yes</td>";
                                                            }else{
                                                                echo "<td>No</td>";
                                                            }
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                ?>
                                                </tr>
                                                <tfoot>
                                                    <tr>
                                                        <th>Total Client: <?=$total_client?></th>
                                                        <th>Total Feed: 0</th>
                                                        <th>Total Story: 0</th>
                                                        <th>Total Reels: 0</th>
                                                        <th>Total TikTok: 0</th>
                                                        <th>Total Visit: 0</th>
                                                    </tr>
                                                </tfoot>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Assign Task -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Assign Task</h6>
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
                                <form method="post" action="./sys/assign_copywriter.php">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Pilih Client:
                                            <select class="form-select" id="client" name="client">
                                                <?php
                                                    foreach($client as $client_id => $client_name){
                                                        echo "<option value='$client_id'>";
                                                        echo $client_name;
                                                        echo "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Pilih ContentWriter:
                                            <select class="form-select" id="contentwriter" name="contentwriter" required>
                                                <?php
                                                    //Get Writer List
                                                    foreach($contentwriter as $id => $name){
                                                        echo "<option value='$id'>";
                                                        echo $name;
                                                        echo "</option>";
                                                    }
                                                    if(empty($contentwriter)){
                                                        echo "<option value='0'>NO DATA</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-3">
                                            Feed: <input type="number" class="form-control" name="feed" max="99" min="0" value="0">
                                        </div>
                                        <div class="col-xl-3">
                                            Story: <input type="number" class="form-control" name="story" max="99" min="0" value="0">
                                        </div>
                                        <div class="col-xl-3">
                                            Reels: <input type="number" class="form-control" name="reels" max="99" min="0" value="0">
                                        </div>
                                        <div class="col-xl-3">
                                            TikTok: <input type="number" class="form-control" name="tiktok" max="99" min="0" value="0"><br>
                                        </div>
                                    </div>
                                    <div class='d-grid gap-2 d-md-flex justify-content-md'>
                                        <button type="submit" class='btn btn-primary'>Assign</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

<?php
    }   //Admin End
?>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <!-- <div class="card shadow mb-4"> -->
                                <!-- Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
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
                                    </div>
                                </div> -->
                                <!-- Card Body -->
                                <!-- <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div> -->
                            <!-- </div> -->
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <!-- <div class="card shadow mb-4"> -->
                                <!-- Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
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
                                    </div>
                                </div> -->
                                <!-- Card Body -->
                                <!-- <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div> -->
                            <!-- </div> -->
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Color System -->
                            <!-- <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div> -->

                            <!-- Approach -->
                            <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div> -->

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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>