<?php
        require_once 'include.php';
        require_once 'header.php';

        require "admin/sys/connect.php";
        $id = $_GET["id"];

        $sql = "SELECT * FROM news WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $title = $row['title'];
                $img = "img/news/".$row['img'];
                $wrap_limit = 500;
                $news = $row['news'];
                $upload_date = $row['upload_date'];
                $phpdate = strtotime($upload_date);
                $date = date('l, d F Y', $phpdate);
            }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UFI</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="./css/style.css" rel="stylesheet">

    </head>

    <body>
        <hr style="margin-bottom: 0;" />
        <div class="container-fluid megathronz-news" style="background-image: url('<?=$img?>'); ">   
        </div>
        <p><i style="margin: 20px; opacity: 0.8">Picture Credit/description</i></p>
        
        
        <div class="container">
            <center>
                <h2 style="font-family: 'Merriweather';"><b><?=$title?></b></h2><br>
                <!-- <h4 style="font-weight: 600">Subtitle Here: Put Here</h4><br><br> -->
                <p style="font-weight: 700"><?=$date?></p><br><br>
            </center>

            <p class="d-index" style="text-align:justify; width: 50vw; font-weight: 400;">
                <?=$news?>
            </p>

            <p class="m-index" style="text-align:justify; font-weight: 400;">
                <?=$news?>
            </p>
        </div>
        
        <hr/>

        <div class="container-fluid">
            <center>
                <h3 class="judul" style="font-family: Merriweather; font-weight: 700; color: #2B388F; margin-top: 50px; margin-bottom: 50px"><b>Read More</b></h3>
                
                <div class="row" style="justify-content: center;">
                <?php
                $sql = "SELECT * FROM news LIMIT 4";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $img = "img/news/".$row['img'];
                        $wrap_limit = 300;
                        $news = $row['news'];
                        $news = strlen($news) > $wrap_limit ? substr($news,0,$wrap_limit)."..." : $news;
                        $upload_date = $row['upload_date'];
                        $phpdate = strtotime($upload_date);
                        $date = date('l, d F Y', $phpdate);
            ?>
                    <div class="card card-newsd" style="border: 0; align-items: center;" onclick="buka(<?=$id?>)">
                        <img class="card-img-top newsdimg" src="<?=$img?>" alt="Fasilitas">
                        <center class="isi-nd"><?=$title?></center>
                        <center class="isi-nd-a"><?=$date?></center>
                    </div>
            <?php
                    }
                }
            ?>

                </div>
                
            </div>
            </center>
            
        </div>
        
    </body>

    <script>
        function buka(id){
            window.location.href = "news-detail.php?id=" + id;
        }
    </script>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>