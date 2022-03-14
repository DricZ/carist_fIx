<?php
    session_start();
    require "./sys/check_integrity.php";
    if(!$valid){
        header("Location: ./login.php");
    }

    echo "<h1>New Client</h1>";
    echo "<h3>Hello, ".$_SESSION["name"]."!</h3>";
    echo "<a href='./dashboard.php'>Dashboard</a><br>";
    echo "<a href='./logout.php'>Logout</a><br><br>";
    //var_dump($_SESSION);
    
    
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Client</title>
</head>
<body>
    <form method="post" action="sys/add_client.php" enctype="multipart/form-data">
        Client Logo: <input type="file" name="logo" required><br>
        Client: <input type="text" name="client"><br>
        Address: <input type="text" name="address"><br>
        Phone: <input type="number" name="phone"><br>
        Instagram: <input type="text" name="instagram"><br>
        TikTok: <input type="text" name="tiktok"><br>
        Facebook: <input type="text" name="facebook"><br>
        YouTube: <input type="text" name="youtube"><br>
        <label for="service">Service</label>
        <select id="service" name="service">
            <option value="Service1" selected>Service1</option>
            <option value="Service2">Service2</option>
            <option value="Service3">Service3</option>
        </select><button disabled>+</button><br>
        Price: <input type="number" name="price" disabled value="1000000"><br>
        From: <input type="date" name="from" required>*required<br>
        To: <input type="date" name="to" required>*required<br>
        <label for="marketing">Marketing</label>
        <select id="marketing" name="marketing">
            <option value="Head" selected>Head</option>
            <option value="1">Steven</option>
            <option value="2">Victor</option>
            <option value="3">Stefany</option>
            <option value="4">Nyoto</option>
        </select><br>
        <label for="visit"> Visit </label>
        <input type="checkbox" id="visit" name="visit" value="visit"><br>
        Notes: <textarea name="notes" rows="10" cols="30"></textarea><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>