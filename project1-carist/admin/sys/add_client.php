<?php
    session_start();
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ../");
    }
    require "connect.php";

    $name = $_POST["client"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $instagram = $_POST["instagram"];
    $tiktok = $_POST["tiktok"];
    $facebook = $_POST["facebook"];
    $youtube = $_POST["youtube"];
    $marketing = $_POST["marketing"];
    $notes = $_POST["notes"];
    $feedcount = $_POST["fc"];
    $storycount = $_POST["sc"];
    $visit = 0;
    if(isset($_POST["visit"])){
        $visit = 1;
    }
    $service = $_POST["service"];    //tergantung jumlah services

    var_dump($service);
    die();

    //Upload Client Logo untuk dapet link
    $target_dir = "../drive/client_logo/";
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
    $basename = basename($_FILES["logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["logo"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["logo"]["size"] > 500000000) {
        echo "Sorry, your file is too large. Maximum is 500MB";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    $uploadSuccess = False;
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.";
            $uploadSuccess = True;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if (!$uploadSuccess){
        echo "<br><a href='../dashboard.php'>Dashboard</a><br>";
        die();    //Comment untuk skip file upload
    }

    //Input Client Data
    $sql = "INSERT INTO client (name, client_logo, address, phone, email, input_date, start_date, end_date, visit, instagram, tiktok, facebook, youtube, status, marketing_id, branding_notes)
            VALUES ('$name', '$basename', '$address','$phone', '$email', now(), '$from', '$to', $visit, '$instagram', '$tiktok', '$facebook', '$youtube', 'pending', '$marketing', '$notes')";
    $result = $conn->query($sql);

    if ($result === TRUE) { //Jika input client ke Database Sukses
        $last_id = $conn->insert_id; //Get Client ID
        //Generate Tasks non Visit
        if($visit == 0){
            //First task = 7 hari kerja setelah input date
            $today = mktime(0,0,0);
            $due = nextDayFrom($today, 7);  //Postdate untuk konten pertama

            //Jika Feed > Story
            if($feedcount > $storycount){
                $ratio = ceil($feedcount/$storycount);
                for($i=1; $i<=$feedcount; $i++){
                    $dueDate = date('Y-m-d', $due);
                    $contentwriter = date('Y-m-d', prevDayFrom($due, 5));
                    $designer = date('Y-m-d', prevDayFrom($due, 3));
                    $copywriter = date('Y-m-d', prevDayFrom($due, 1));
                    //Input ke Database
                    $sql = "INSERT INTO task (client_id, post_date, content_no, content_type, contentwriter_status, contentwriter_duedate, designer_status, designer_duedate, copywriter_status, copywriter_duedate)
                            VALUES ($last_id, '$dueDate', $i, 'feed', 'pending', '$contentwriter', 'pending', '$designer', 'pending', '$copywriter')";
                    if ($conn->query($sql) === TRUE) {
                        //echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        die();
                    }
                    //Jika kelipatan 3 maka diselipin story
                    if($i%$ratio == 0 && ($i/$ratio) >= 1 && ($i/$ratio) <= $storycount){
                        //Next 1 day
                        $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        if(date('l', $due) == "Sunday" && !isHoliday($due)){
                            $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        }
                        $dueDate = date('Y-m-d', $due);
                        //Post Task Story ke DB
                        $storyno = (int)($i/$ratio);
                        $sql = "INSERT INTO task (client_id, post_date, content_no, content_type, contentwriter_status, contentwriter_duedate, designer_status, designer_duedate, copywriter_status, copywriter_duedate)
                                VALUES ($last_id, '$dueDate', $storyno, 'story', 'pending', '$contentwriter', 'pending', '$designer', 'pending', '$copywriter')";
                        if ($conn->query($sql) === TRUE) {
                            //echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                            die();
                        }
                        //Next 1 day
                        $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        if(date('l', $due) == "Sunday" && !isHoliday($due)){
                            $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        }
                        $dueDate = date('Y-m-d', $due);
                    }else{
                        //Hanya tambah hari
                        $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+2, date('Y', $due));
                        if(date('l', $due) == "Sunday" && !isHoliday($due)){
                            $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        }
                        $dueDate = date('Y-m-d', $due);
                    }
                }
                if(($i/$ratio) <= $storycount){
                    //Add Story terakhir
                    //Post Task Story ke DB
                    $storyno = (int)($i/$ratio);
                    $sql = "INSERT INTO task (client_id, post_date, content_no, content_type, contentwriter_status, contentwriter_duedate, designer_status, designer_duedate, copywriter_status, copywriter_duedate)
                            VALUES ($last_id, '$dueDate', $storyno, 'story', 'pending', '$contentwriter', 'pending', '$designer', 'pending', '$copywriter')";
                    if ($conn->query($sql) === TRUE) {
                        //echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        die();
                    }
                }
            }else if($storycount > $feedcount){
                $ratio = ceil($storycount/$feedcount);
                for($i=1; $i<=$storycount; $i++){
                    $dueDate = date('Y-m-d', $due);
                    $contentwriter = date('Y-m-d', prevDayFrom($due, 5));
                    $designer = date('Y-m-d', prevDayFrom($due, 3));
                    $copywriter = date('Y-m-d', prevDayFrom($due, 1));
                    //Input ke Database
                    $sql = "INSERT INTO task (client_id, post_date, content_no, content_type, contentwriter_status, contentwriter_duedate, designer_status, designer_duedate, copywriter_status, copywriter_duedate)
                            VALUES ($last_id, '$dueDate', $i, 'story', 'pending', '$contentwriter', 'pending', '$designer', 'pending', '$copywriter')";
                    if ($conn->query($sql) === TRUE) {
                        //echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        die();
                    }
                    //Jika kelipatan ratio maka diselipin feed
                    if($i%$ratio == 0 && ($i/$ratio) >= 1 && ($i/$ratio) <= $feedcount){
                        //Next 1 day
                        $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        if(date('l', $due) == "Sunday" && !isHoliday($due)){
                            $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        }
                        $dueDate = date('Y-m-d', $due);
                        //Post Task Feed ke DB
                        $storyno = (int)($i/$ratio);
                        $sql = "INSERT INTO task (client_id, post_date, content_no, content_type, contentwriter_status, contentwriter_duedate, designer_status, designer_duedate, copywriter_status, copywriter_duedate)
                                VALUES ($last_id, '$dueDate', $storyno, 'feed', 'pending', '$contentwriter', 'pending', '$designer', 'pending', '$copywriter')";
                        if ($conn->query($sql) === TRUE) {
                            //echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                            die();
                        }
                        //Next 1 day
                        $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        if(date('l', $due) == "Sunday" && !isHoliday($due)){
                            $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        }
                        $dueDate = date('Y-m-d', $due);
                    }else{
                        //Hanya tambah hari
                        $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+2, date('Y', $due));
                        if(date('l', $due) == "Sunday" && !isHoliday($due)){
                            $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                        }
                        $dueDate = date('Y-m-d', $due);
                    }
                }
                if(($i/$ratio) <= $feedcount){
                    //Add Feed Terakhir
                    //Post Task Feed ke DB
                    $storyno = (int)($i/$ratio);
                    $sql = "INSERT INTO task (client_id, post_date, content_no, content_type, contentwriter_status, contentwriter_duedate, designer_status, designer_duedate, copywriter_status, copywriter_duedate)
                            VALUES ($last_id, '$dueDate', $storyno, 'feed', 'pending', '$contentwriter', 'pending', '$designer', 'pending', '$copywriter')";
                    if ($conn->query($sql) === TRUE) {
                        //echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        die();
                    }
                }
            }else if($feedcount == $storycount){
                for($i=1; $i<=$feedcount; $i++){
                    $dueDate = date('Y-m-d', $due);
                    $contentwriter = date('Y-m-d', prevDayFrom($due, 5));
                    $designer = date('Y-m-d', prevDayFrom($due, 3));
                    $copywriter = date('Y-m-d', prevDayFrom($due, 1));
                    //Input ke Database
                    $sql = "INSERT INTO task (client_id, post_date, content_no, content_type, contentwriter_status, contentwriter_duedate, designer_status, designer_duedate, copywriter_status, copywriter_duedate)
                            VALUES ($last_id, '$dueDate', $i, 'feed', 'pending', '$contentwriter', 'pending', '$designer', 'pending', '$copywriter')";
                    if ($conn->query($sql) === TRUE) {
                        //echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        die();
                    }
                    //Next 1 day
                    $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+2, date('Y', $due));
                    if(date('l', $due) == "Sunday" && !isHoliday($due)){
                        $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                    }
                    $dueDate = date('Y-m-d', $due);
                    //Post Task Story ke DB
                    $storyno = $i;
                    $sql = "INSERT INTO task (client_id, post_date, content_no, content_type, contentwriter_status, contentwriter_duedate, designer_status, designer_duedate, copywriter_status, copywriter_duedate)
                            VALUES ($last_id, '$dueDate', $storyno, 'story', 'pending', '$contentwriter', 'pending', '$designer', 'pending', '$copywriter')";
                    if ($conn->query($sql) === TRUE) {
                        //echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        die();
                    }
                    //Next 1 day
                    $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+2, date('Y', $due));
                    if(date('l', $due) == "Sunday" && !isHoliday($due)){
                        $due = mktime(0, 0, 0, date('m', $due), date('d', $due)+1, date('Y', $due));
                    }
                    $dueDate = date('Y-m-d', $due);
                }
            }
            //Input service
            for($i=0; $i<sizeof($service); $i++){
                $serviceName = "";
                $price = 0;
                $sql = "SELECT * FROM service_list";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $serviceName = $row['service_name'];
                    $price = $row['price'];
                    $feed_count = $row['feed_count'];
                    $story_count = $row['story_count'];
                    $reels_count = $row['reels_count'];
                    $tiktok_count = $row['tiktok_count'];
                }
                } else {
                    echo "0 results";
                }
                $sql = "INSERT INTO service (
                    'service_id',
                    'client_id',	
                    'service_name',	
                    'price',
                    'feed_count',	
                    'story_count',
                    'reels_count',
                    'tiktok_count')
                    VALUES ($service[$i], $last_id, $serviceName, $price, $feed_count, $story_count, $reels_count, $tiktok_count)";
                if ($conn->query($sql) === TRUE) {
                    //echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    die();
                }
            }
        }else{
            //Generate Task with Visit

        }

        //Redirect Back
        header("Location: ../new_client.php?id=$last_id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    

    function isHoliday($time){
        $day = date('d-m-Y', $time);
        // Cek ke DB jika libur
        return FALSE;
    }

    $conn->close();
    //NON DATABASE FUNCTION

    function dateDiff($time1, $time2){
        $day1 = date('d', $time1);
        $month1 = date('m', $time1);
        $year1 = date('Y', $time1);
        $count=0;
        while($time1!=$time2){
            $time1 = mktime(0, 0, 0, $month1, $day1+1, $year1);
            $day1 = date('d', $time1);
            $month1 = date('m', $time1);
            $year1 = date('Y', $time1);
            $count++;
            if(date('l', $time1) == "Sunday"){
                $count--;
            }
        }
        return $count;
    }

    function nextDay($num){
        //echo "Today is ".date('l, d-m-Y')."<br>";
        $day = date('d');
        $month = date('m');
        $year = date('Y');
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

    function prevDay($num){
        //echo "Today is ".date('l, d-m-Y')."<br>";
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        for ($i = 1; $i <= $num; $i++)
        {
            //echo ($i)." ";
            $yesterday  = mktime(0, 0, 0, $month  , $day-1, $year);
            if(date('l', $yesterday) == "Sunday"){
                $i--;
            }
            $day = date('d', $yesterday);
            $month = date('m', $yesterday);
            $year = date('Y', $yesterday);
            //echo "Day: ".$day." Month: ".$month." Year: ".$year." ".date('l, d-m-Y', $tomorrow)."<br>";
        }
        return $yesterday;
    }

    function prevDayFrom($time, $num){
        //echo "Today is ".date('l, d-m-Y')."<br>";
        $day = date('d', $time);
        $month = date('m', $time);
        $year = date('Y', $time);
        for ($i = 1; $i <= $num; $i++)
        {
            //echo ($i)." ";
            $yesterday  = mktime(0, 0, 0, $month  , $day-1, $year);
            if(date('l', $yesterday) == "Sunday"){
                $i--;
            }
            $day = date('d', $yesterday);
            $month = date('m', $yesterday);
            $year = date('Y', $yesterday);
            //echo "Day: ".$day." Month: ".$month." Year: ".$year." ".date('l, d-m-Y', $tomorrow)."<br>";
        }
        return $yesterday;
    }

?>