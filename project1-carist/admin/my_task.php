<?php
    session_start();
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./login.php");
    }
    $my_id = $_SESSION['userid'];
    echo "<h1>My Task</h1>";
    echo "<a href='./dashboard.php'>Dashboard</a><br>";

    $sql = "SELECT * FROM client";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $client_id = $row["client_id"];
            $client_name = $row["name"];
            $client_logo = $row["client_logo"];
            $visit = $row["visit"];
            echo "<h3>$client_name <button>+</button></h3>";

            //Search All Task with that client ID
            $sql2 = "SELECT * FROM task WHERE client_id = $client_id";// AND contentwriter_id = $my_id";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) {
                    $task_id = $row2["task_id"];
                    $content_no = $row2["content_no"];
                    $content_type = $row2["content_type"];
                    $display_name = strtoupper($content_type . " " . $content_no);
                    echo "<b>$display_name</b><br>";
                    echo "Main Topic: <input type='text' name='main_topic'><br>";
                    echo "Sub Topic: <input type='text' name='sub_topic'><br>";
                    echo "Concept: <input type='text' name='concept'><br>";
                    echo "Link Referensi: <input type='text' name='ref_link'><br>";
                    echo "Notes: <textarea name='notes' rows='10' cols='30'></textarea><br>";
                    echo "<button>Submit</button><br><br>";
                }
            }
        }
    }
?>