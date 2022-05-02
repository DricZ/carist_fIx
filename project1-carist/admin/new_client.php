<?php
    require_once 'include.php';
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./index.php");
    }

    function nextDayFrom($time, $num){
        //echo "Today is ".date('l, d-m-Y')."<br>";
        $day = date('d', $time);
        $month = date('m', $time);
        $year = date('Y', $time);
        for ($i = 1; $i <= $num; $i++)
        {
            //echo ($i)." ";
            $tomorrow  = mktime(0, 0, 0, $month  , $day+1, $year);
            if(date('l', $tomorrow) == "Sunday"){
                $i--;
            }
            $day = date('d', $tomorrow);
            $month = date('m', $tomorrow);
            $year = date('Y', $tomorrow);
            //echo "Day: ".$day." Month: ".$month." Year: ".$year." ".date('l, d-m-Y', $tomorrow)."<br>";
        }
        return $tomorrow;
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

        .col-md-8{
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

                <?php
                    require 'sidebar_button.php';
                ?>

                <!-- Begin Page Content -->
                <nav style="margin-bottom: 30px;margin-left: 40px;" class="breadcrumbs">
                    <a href="" class="breadcrumbs__item is-active">Brand Information</a> 
                    <?php
                        if(isset($_GET['id'])){
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
                                    $start_date = $row['start_date'];
                                    $end_date = $row['end_date'];
                                    $visit = $row['visit'];
                                    $instagram = $row['instagram'];
                                    $tiktok = $row['tiktok'];
                                    $facebook = $row['facebook'];
                                    $youtube = $row['youtube'];

                                    $date=date_create($input_date);
                                    $disp_date = date_format($date,"j F Y");
                                }
                            }
                            echo "<a class='breadcrumbs__item' href='./new_client_inv.php?id=$client_id'>Invoice</a>";
                        }else{
                            echo "<a class='breadcrumbs__item' href='./new_client_inv.php'>Invoice</a>";
                        }
                    ?>
            </nav>

                <form method="post" action="sys/add_client.php" enctype="multipart/form-data">
                    <div class="row pl-5 pr-5">
                        <div class="col-md-3">
                            <div class="form-group" style="padding-right: 20px;">
                                <label class="form-label" for="customFile">Upload</label>
                                <input type="file" class="form-control" name="logo" id="customFile" required />
                                <img id='img-upload'/>
                            </div>
                        </div>

                        <div class="col-md-5" style="margin-bottom: 30px;">
                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="inputnama" class="col-form-label">Brand Name: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="inputnama" name="client" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="inputalamat" class="col-form-label">Address: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="inputalamat" name="address" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="inputnohp" class="col-form-label">Phone Number: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" id="inputnohp" name="phone" class="form-control" required>
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="inputnohp" class="col-form-label">Email: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" id="inputemail" name="email" class="form-control" required>
                                </div>
                            </div><br>

                            <label for="tanggal" aria-hidden="true">Date: </label>
                            <?php
                                $today = mktime(0,0,0);
                                $from = nextDayFrom($today, 7);  //Postdate untuk konten pertama
                                $to = nextDayFrom($from, 1);  //Postdate untuk konten terakhir
                                $fromDate = date('Y-m-d', $from);
                                $toDate = '';
                            ?>
                            <table class="table table-borderless table-responsive-md">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">From</th>
                                    <th style="text-align: center;">To</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="date" class="form-control" name="from" id="from" placeholder="tanggal" value="<?=$fromDate?>" readonly required></td>
                                    <?php

                                    ?>
                                    <td><input type="date" class="form-control" name="to" id="to" placeholder="tanggal2" value="<?=$toDate?>" readonly required></td>
                                </tr>
                                </tbody>
                            </table><br>
                            
                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="inputig" class="col-form-label">Instagram ID: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="inputig" class="form-control" name="instagram">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="inputtt" class="col-form-label">Tiktok ID: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="inputtt" class="form-control" name="tiktok">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="fb" class="col-form-label">Facebook: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="fb" class="form-control" name="facebook">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="yt" class="col-form-label">Youtube: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="yt" class="form-control" name="youtube">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center pr-4">
                                <div class="col-md-4">
                                    <label for="inputmarkt" class="col-form-label">Marketing: </label>
                                </div>
                                <div class="col-md-8">
                                    <select id="inputmarkt" class="form-select" name="marketing" required>
                                        <option value="0" selected>Head</option>
                                        <?php
                                            // Get Service List
                                            $sql = "SELECT * FROM user WHERE role1='marketing' OR role2='marketing'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $user_id = $row['user_id'];
                                                    $name = $row['name'];
                                                    echo "<option value='$user_id'>$name</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div><br>
                        </div>

                        <div class="col-md-4">
                            <div id="div1" class="row g-3 align-items-center">
                                <div class="col-md-2 p-0 pl-2">
                                    <label for="service1" class="col-form-label">Service: </label>
                                </div>
                                <div id="p1" class="col-md-10">
                                    <select id="service1" class="form-select" style="width: 85%;" name="service[]" required >
                                        <option value='0' data-price='0' data-day='0' data-feed='0' data-story='0' selected>--- Please Select Service ---</option>
                                        <?php
                                            // Get Service List
                                            $sql = "SELECT * FROM service_list";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $service_id = $row['service_id'];
                                                    $service_name = $row['service_name'];
                                                    $price = $row['price'];
                                                    $day = $row['day'];
                                                    $feed_count = $row['feed_count'];
                                                    $story_count = $row['story_count'];
                                                    $reels_count = $row['reels_count'];
                                                    $tiktok_count = $row['tiktok_count'];
                                                    echo "<option value='$service_id' data-price='$price' data-day='$day' data-feed='$feed_count' data-story='$story_count'>$service_name</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    <i id="s1" class="fa-solid fa-plus" style="position: absolute;margin-top: -25px;margin-left: 86%; cursor:pointer"></i>
                                </div>
                            </div>

                            <br>
                            <div class="row g-3 align-items-center">
                                <div class="col-md-2 p-0 pl-2">
                                    <label for="fc" class="col-form-label">Feed Count: </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="fc" class="form-control" name="fc" readonly value="0">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-md-2 p-0 pl-2">
                                    <label for="sc" class="col-form-label">Story Count: </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="sc" class="form-control" name="sc" readonly value="0">
                                </div>
                            </div><br>
                            
                            <div class="row g-3 align-items-center">
                                <div class="col-md-2 p-0 pl-2">
                                    <label for="price" class="col-form-label">Price: </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="price" class="form-control" name="price" disabled value="0">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-md-2 p-0 pl-2">
                                    <label for="visit" class="col-form-label">Visit: </label>
                                </div>
                                <div class="col-md-10">
                                    <input class="form-check-input" type="checkbox" style="position: relative; margin-left: 0" name="visit" value="visit" id="visit">
                                </div>
                            </div><br>

                            <div class="row g-3 align-items-center">
                                <div class="col-md-2 p-0 pl-2">
                                    <label for="notes" class="col-form-label">Notes: </label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" id="notes" rows="4" name="notes" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12" style="justify-content: center;display: flex;margin-top: 50px;">
                                    <button type="submit" class="btn btn-primary" style="margin-bottom: 30px;width: 110px;">Submit</button>
                                </div>
                            </div>
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
        counter = 1;
        counter2 = 1;
        total_day = 0
        const price = [];
        const day = [];
        const feed = [];
        const story = [];

        if(total_day == 0){
            $('#to').removeAttr('readonly');
        }
        else{
            $('#to').attr('readonly', true);
        }

        for(let i=0; i<20; i++){
            price[i] = 0;
            day[i] = 0;
            feed[i] = 0;
            story[i] = 0;
        }

        function numberWithCommas(x) {
            x = x.toString();
            var pattern = /(-?\d+)(\d{3})/;
            while (pattern.test(x))
                x = x.replace(pattern, "$1,$2");
            return x;
        }

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

        //Change Service
        $('#service1').change(function(e){
            price[0] = $(this).find(':selected').data('price');
            day[0] = $(this).find(':selected').data('day');
            feed[0] = $(this).find(':selected').data('feed');
            story[0] = $(this).find(':selected').data('story');
            //Total Price
            let total_price = 0;
            total_day = 0;
            let total_feed = 0;
            let total_story = 0;
            for(let i=0; i<price.length; i++){
                total_price += price[i];
                total_day += day[i];
                total_feed += feed[i];
                total_story += story[i];
            }
            $('#price').attr('value', numberWithCommas(total_price));
            //Next x Day
            var dt = new Date();
            dt.setDate(dt.getDate() + 7);   //Default upload pertama
            dt.setDate(dt.getDate() + total_day);
            var tempDate = dt.toISOString().split('T')[0];
            $('#to').attr('value', tempDate);
            $('#fc').attr('value', total_feed);
            $('#sc').attr('value', total_story);

            if(total_day == 0){
                $('#to').removeAttr('readonly');
            }
            else{
                $('#to').attr('readonly', true);
            }
        });

        $("#s1").click(function(){

            svc = $("#s1").parent().parent().attr('id');
            svcp = "#"+svc;

            loop1 = "div"+(counter+1);
            loop2 = "removesv"+(counter+1);
            loop3 = "#div"+(counter);
            brid = "br"+(counter+1);
            counter++;

            var txt1 = "<br id='"+brid+"'><div id='"+
                            loop1
                            +"' class='row g-3 align-items-center'>" + "<div class='col-md-2 p-0 pl-2'>"
                                        +"<label for='service"+ counter +"' class='col-form-label'>Service "+ counter +": </label>"
                                    +"</div>"
                                    +"<div class='col-md-10'>"
                                        +"<select id='service"+ counter +"' class='form-select' style='width: 85%;' name='service[]' required >"
                                            +"<option value='0' data-price='0' data-day='0' data-feed='0' data-story='0' selected>--- Please Select Service ---</option>"
                                            +"<?php echo
                                                $sql = "SELECT * FROM service_list";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        $service_id = $row['service_id'];
                                                        $service_name = $row['service_name'];
                                                        $price = $row['price'];
                                                        $day = $row['day'];
                                                        $feed_count = $row['feed_count'];
                                                        $story_count = $row['story_count'];
                                                        $reels_count = $row['reels_count'];
                                                        $tiktok_count = $row['tiktok_count'];
                                                        echo "<option value='$service_id' data-price='$price' data-day='$day' data-feed='$feed_count' data-story='$story_count'>$service_name</option>";
                                                    }
                                                }
                                            ?>"
                                        +"</select>"
                                        +"<i id='"+loop2+"' onclick='deletesv(`"+
                                        loop1
                                        +"`, `"+ brid +"`,`"+ counter +"`);' class='fa-solid fa-minus' style='position: absolute;margin-top: -25px;margin-left: 86%; cursor:pointer'></i>"
                                    +"</div>"
                                +"</div>";

            $(loop3).after(txt1);
            //Change Service
            var serviceid = '#service'+counter;
            $(serviceid).click(function(e){
                counter2 = parseInt($(this).attr('id').substr(7));
            });
            $(serviceid).change(function(e){
                price[counter2-1] = $(this).find(':selected').data('price');
                day[counter2-1] = $(this).find(':selected').data('day');
                feed[counter2-1] = $(this).find(':selected').data('feed');
                story[counter2-1] = $(this).find(':selected').data('story');
                //Total Price
                let total_price = 0;
                let total_day = 0;
                let total_feed = 0;
                let total_story = 0;
                for(let i=0; i<price.length; i++){
                    total_price += price[i];
                    total_day += day[i];
                    total_feed += feed[i];
                    total_story += story[i];
                }
                $('#price').attr('value', numberWithCommas(total_price));
                //Next x Day
                var dt = new Date();
                dt.setDate(dt.getDate() + 7);   //Default upload pertama
                dt.setDate(dt.getDate() + total_day);
                var tempDate = dt.toISOString().split('T')[0];
                $('#to').attr('value', tempDate);
                $('#fc').attr('value', total_feed);
                $('#sc').attr('value', total_story);

                console.log(total_day);
            });
        });
	});

    function deletesv(id, brid, index){
        const dd1 = document.getElementById(id);
        const brr = document.getElementById(brid);
        price[index-1] = 0;
        day[index-1] = 0;
        feed[index-1] = 0;
        story[index-1] = 0;
        console.log(index);
        console.log(price);
            //Total Price
            let total_price = 0;
            let total_day = 0;
            let total_feed = 0;
            let total_story = 0;
            for(let i=0; i<price.length; i++){
                total_price += price[i];
                total_day += day[i];
                total_feed += feed[i];
                total_story += story[i];
            }
            $('#price').attr('value', numberWithCommas(total_price));
            //Next x Day
            var dt = new Date();
            dt.setDate(dt.getDate() + 7);   //Default upload pertama
            dt.setDate(dt.getDate() + total_day);
            var tempDate = dt.toISOString().split('T')[0];
            $('#to').attr('value', tempDate);
            $('#fc').attr('value', total_feed);
            $('#sc').attr('value', total_story);
        counter--;
        dd1.remove();
        brr.remove();

        if(total_day == 0){
            $('#to').removeAttr('readonly');
        }
        else{
            $('#to').attr('readonly', true);
        }
    };

    </script>

</body>

</html>