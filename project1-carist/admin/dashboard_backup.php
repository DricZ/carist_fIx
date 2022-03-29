<?php
    session_start();
    require "sys/connect.php";
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./login.php");
    }

    echo "<h1>Dashboard</h1>";
    echo "<h3>Hello, ".$_SESSION["name"]."!</h3>";
    echo "<a href='./logout.php'>Logout</a><br>";
    //var_dump($_SESSION);
    
    //Tampilkan seluruh brand
    echo "<a href='./new_client.php'>Add Client</a><br>";
    echo "<a href='./my_task.php'>My Task</a><br>";
    
    $client = array();
    $contentwriter = array();

    // Get Writer List
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
    
    

?>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <table>
    <tr>
        <th>Client</th>
        <th>Feed</th>
        <th>Story</th>
        <th>Reels</th>
        <th>TikTok</th>
        <th>Visit</th>
    </tr>
    <?php
        $sql = "SELECT * FROM client";
        $result = $conn->query($sql);

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
                echo "<td>$visit</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
    ?>
    </table>

    <h3>Assign Task</h3>
    <form method="post" action="./sys/assign_copywriter.php">
        Pilih Client:
        <select id="client" name="client">
            <?php
                foreach($client as $client_id => $client_name){
                    echo "<option value='$client_id'>";
                    echo $client_name;
                    echo "</option>";
                }
            ?>
        </select><br>
        Pilih ContentWriter:
        <select id="contentwriter" name="contentwriter" required>
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
        </select><br>
        Feed: <input type="number" name="feed" max="99" min="0" value="0">
        Story: <input type="number" name="story" max="99" min="0" value="0">
        Reels: <input type="number" name="reels" max="99" min="0" value="0">
        TikTok: <input type="number" name="tiktok" max="99" min="0" value="0"><br>
        <button type="submit">Assign</button>
    </form>
</body>
</html>

<?php
    $conn->close();
?>