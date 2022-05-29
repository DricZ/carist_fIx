<?php
    require 'include.php';
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
    }
    $my_id = $_SESSION['userid'];

    

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="fonts/icomoon/style.css"> -->
    
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

    <!-- FullCalendar -->
    <link href='./fullcalendar/main.css' rel='stylesheet' />
    <script src='./fullcalendar/main.js'></script>
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style1.css">
    <script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: '<?=date('Y-m-d', mktime(0,0,0)); ?>',
      navLinks: true, // can click day/week names to navigate views
      businessHours: {
                        // days of week. an array of zero-based day of week integers (0=Sunday)
                        daysOfWeek: [ 1, 2, 3, 4, 5, 6 ], // Monday - Thursday
                      },
      editable: false,
      selectable: true,
      dayMaxEventRows: true,

      events: [

        <?php
                          $sql2 = "SELECT * FROM task"; //WHERE (contentwriter_id = $my_id OR designer_id = $my_id OR copywriter_id = $my_id)";
                          $result2 = $conn->query($sql2);
                          if ($result2->num_rows > 0) {
                            // output data of each row
                            while($row2 = $result2->fetch_assoc()) {
                              $task_id = $row2["task_id"];
                              $client_id = $row2["client_id"];
                              $sql3 = "SELECT * FROM client WHERE client_id=$client_id";
                              $result3 = $conn->query($sql3);
                              if ($result3->num_rows > 0) {
                                // output data of each row
                                while($row3 = $result3->fetch_assoc()) {
                                  $client_name = $row3["name"];
                                }
                              }else{
                                $client_name = "ERR01";
                              }
                              $post_date = $row2["post_date"] . "T01:00:00";
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
                              $display_name = strtoupper($client_name . " - " . $content_type . " " . $content_no);
                              $section_id = strtolower("task".$task_id);
                              if($main_topic != ""){
                                  $fieldset = "disabled";
                              }else{
                                  $fieldset = "";
                              }
                              //Check Flow Step
                              $contentwriter_status = $row2["contentwriter_status"];
                              $designer_status = $row2["designer_status"];
                              $copywriter_status = $row2["copywriter_status"];
                              $color = "blue";
                              if($copywriter_status == "pending"){
                                  $step = "copywriter";
                                  $color = "green";
                              }
                              if($designer_status == "pending"){
                                  $step = "designer";
                                  $color = "orange";
                              }
                              if($contentwriter_status == "pending"){
                                  $step = "contentwriter";
                                  $color = "red";
                              }

                              if($adminAccess){
                                
                                echo "{
                                  title: '$display_name',
                                  start: '$post_date',
                                  backgroundColor: '$color'
                                },";
                              }else{
                                $color = "blue";
                                $role1 = $_SESSION['role1'];
                                $role2 = $_SESSION['role2'];
                                $stat1 = $role1 . "_status";
                                $stat2 = $role2 . "_status";
                                //echo "<script>console.log($stat1);</script>";
                                $rule1 = $_SESSION['role1'] . "_id";
                                if($_SESSION['role2'] != ""){
                                  $rule2 = $_SESSION['role2'] . "_id";
                                }else{
                                  $rule2 = $rule1;
                                }
                                
                                if($row2["$rule1"] == "$my_id" || $row2["$rule2"] == "$my_id"){
                                  $color = "blue";
                                  if(${$stat1} == "pending"){
                                    $color = "red";
                                  } else if(${$stat1} == "review"){
                                    $color = "orange";
                                  } else if(${$stat1} == "approved"){
                                    $color = "green";
                                  }
                                  echo "{
                                    title: '$display_name',
                                    start: '$post_date',
                                    backgroundColor: '$color'
                                  },";
                                }
                              }
                            }
                            echo "{
                              title: 'Test Event',
                              start: '2022-05-12T01:00:00',
                              backgroundColor: '$color'
                            }";
                          }
                        ?>
                        

        // {
        //   title: 'Business Lunch',
        //   start: '2020-09-03T13:00:00',
        //   constraint: 'businessHours'
        // },
        // {
        //   title: 'Meeting',
        //   start: '2020-09-13T11:00:00',
        //   constraint: 'availableForMeeting', // defined below
        //   color: '#257e4a'
        // },
        // {
        //   title: 'Conference',
        //   start: '2020-09-18',
        //   end: '2020-09-20'
        // },
        // {
        //   title: 'Party',
        //   start: '2020-09-29T20:00:00'
        // },

        // areas where "Meeting" must be dropped
        // {
        //   groupId: 'availableForMeeting',
        //   start: '2020-09-11T10:00:00',
        //   end: '2020-09-11T16:00:00',
        //   display: 'background'
        // },
        // {
        //   groupId: 'availableForMeeting',
        //   start: '2020-09-13T10:00:00',
        //   end: '2020-09-13T16:00:00',
        //   display: 'background'
        // },

        // // red areas where no events can be dropped
        // {
        //   start: '2020-09-24',
        //   end: '2020-09-28',
        //   overlap: false,
        //   display: 'background',
        //   color: '#ff9f89'
        // },
        // {
        //   start: '2020-09-06',
        //   end: '2020-09-08',
        //   overlap: false,
        //   display: 'background',
        //   color: '#ff9f89'
        // }
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>

    <title>Calendar</title>

    <style>
      body{
        font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        
      }    

      hr{
        opacity: .25;
        color: #858796;
      }
    </style>
  </head>
  <body>
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

                <div id='calendar'></div>

                <!-- Begin Page Content -->
                  

                </script>
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