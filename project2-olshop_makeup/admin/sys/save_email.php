<?php
    session_start();
    require "connect.php";

    if(isset($_POST["email"])){
        $email = $_POST["email"];
        //Masukkan ke DB
        $sql = "INSERT INTO email (email)
                VALUES ('$email')";
        $result = $conn->query($sql);

        if ($result === TRUE) { //Jika input client ke Database Sukses
            echo "<br>Save Email Sukses!<br>";
            //echo "<a href='../add_product.php'>Back</a>";
            
            ini_set( 'display_errors', 1 );   
            error_reporting( E_ALL );    
            $from = "system@unitedfarmaticindonesia.com";    
            $to = "$email";
            $subject = "Terimakasih telah subscribe ke PT.United Farmatic Indonesia";
            $message = "Email anda $email telah terdaftar di server kami, terimakasih";
            $headers = "From:" . $from;
            $headers .= 'Cc: system@unitedfarmaticindonesia.com' . "\r\n";
            mail($to,$subject,$message, $headers);
            echo "Pesan email sudah terkirim.";
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    

?>