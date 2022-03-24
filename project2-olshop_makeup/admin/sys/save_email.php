<?php
    session_start();
    require "connect.php";

    $email = $_POST["email"];
    //Masukkan ke DB
    $sql = "INSERT INTO email (email)
            VALUES ('$email')";
    //$result = $conn->query($sql);

    // if ($result === TRUE) { //Jika input client ke Database Sukses
    //     echo "<br>Save Email Sukses!<br>";
    //     //echo "<a href='../add_product.php'>Back</a>";
    //     header("Location: ../../index.php");
    // }

    $to = "joshuayordana8@gmail.com";
    $subject = "Test email";
    
    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>
    <tr>
    <td>John</td>
    <td>Doe</td>
    </tr>
    </table>
    </body>
    </html>
    ";
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: <webmaster@example.com>' . "\r\n";
    $headers .= 'Cc: myboss@example.com' . "\r\n";
    
   mail($to,$subject,$message,$headers);

?>