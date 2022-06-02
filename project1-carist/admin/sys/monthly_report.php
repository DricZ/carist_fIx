<?php
    session_start();
    require "./check_integrity.php";
    if(!$valid){
        header("Location: ../login.php");
    }
    require "connect.php";
    
    if(isset($_POST['month']) && isset($_POST['year'])){
        $month = $_POST['month'];
        $year = $_POST['year'];
        // echo $month;
        // echo $year;
?>

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
            WHERE potential_client.id IN (SELECT id FROM `potential_client` WHERE EXTRACT(MONTH FROM tanggal) = '$month' AND EXTRACT(YEAR FROM tanggal) = '$year')
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

<?php     
    }else{
        echo "No data posted";
    }
?>

