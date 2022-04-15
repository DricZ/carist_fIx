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
  
    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style1.css">

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

                <!-- Begin Page Content -->
                <div id='calendar-container'>
                  <div id='calendar'></div>
                </div>
                  <script src="js/jquery-3.3.1.min.js"></script>
                  <script src="js/popper.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>

                  <script src='fullcalendar/packages/core/main.js'></script>
                  <script src='fullcalendar/packages/interaction/main.js'></script>
                  <script src='fullcalendar/packages/daygrid/main.js'></script>
                  <script src='fullcalendar/packages/timegrid/main.js'></script>
                  <script src='fullcalendar/packages/list/main.js'></script>

                  

                  <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                      height: 'parent',
                      header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                      },
                      defaultView: 'dayGridMonth',
                      defaultDate: '2020-02-12',
                      navLinks: true, // can click day/week names to navigate views
                      editable: true,
                      eventLimit: true, // allow "more" link when too many events
                      events: [
                        {
                          title: 'All Day Event',
                          start: '2020-02-01',
                        },
                        {
                          title: 'Long Event',
                          start: '2020-02-07',
                          end: '2020-02-10'
                        },
                        {
                          groupId: 999,
                          title: 'Repeating Event',
                          start: '2020-02-09T16:00:00'
                        },
                        {
                          groupId: 999,
                          title: 'Repeating Event',
                          start: '2020-02-16T16:00:00'
                        },
                        {
                          title: 'Conference',
                          start: '2020-02-11',
                          end: '2020-02-13'
                        },
                        {
                          title: 'Meeting',
                          start: '2020-02-12T10:30:00',
                          end: '2020-02-12T12:30:00'
                        },
                        {
                          title: 'Lunch',
                          start: '2020-02-12T12:00:00'
                        },
                        {
                          title: 'Meeting',
                          start: '2020-02-12T14:30:00'
                        },
                        {
                          title: 'Happy Hour',
                          start: '2020-02-12T17:30:00'
                        },
                        {
                          title: 'Dinner',
                          start: '2020-02-12T20:00:00'
                        },
                        {
                          title: 'Birthday Party',
                          start: '2020-02-13T07:00:00'
                        },
                        {
                          title: 'Click for Google',
                          url: 'http://google.com/',
                          start: '2020-02-28'
                        }
                      ]
                    });

                    calendar.render();
                  });

                </script>

                <script src="js/main.js"></script>
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

  
  </body>
</html>