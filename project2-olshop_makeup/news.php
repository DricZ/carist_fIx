<?php
        require_once 'include.php';
        require_once 'header.php';
        require "admin/sys/connect.php";

        $sql = "SELECT * FROM news";
        $result = $conn->query($sql);
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
        <hr/>
        
        <div class="container-fluid" style="">
            <?php
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
            <div class="row row-news mt-5" onclick="buka(<?=$id?>)" style="margin-bottom: 30px; width: 110%">
                <div class="col-md-5 right d-produk">
                    <img src="<?=$img?>" style="width: 70%; border-radius: 5px; object-fit: cover;">
                </div>

                <div class="col-md-5 p-0 m-produk">
                    <img src="<?=$img?>" style="width: 100%; object-fit: cover;">
                </div>

                <!-- aslie 7 -->
                <div class="col-md-5 d-produk">
                    <h3 style="font-family: 'Merriweather'"><b><?=$title?></b></h3>
                    <p style="font-size: 16px"><?=$news." read more"?></p><br>
                    <p style="font-size: 16px; font-weight: normal"><?=$date?></p>
                </div>

                <div class="col-md-5 m-peoduk p-5">
                    <h3 style="font-family: 'Merriweather'"><b><?=$title?></b></h3>
                    <p style="font-size: 16px"><?=$news." read more"?></p><br>
                    <p style="font-size: 16px; font-weight: normal"><?=$date?></p>
                </div>
            </div>

            <hr/>
            <?php
                    }
                }
            ?>

            
            
            </div>

                <ul class="pagination justify-content-center">
                    <li class="page-item" ><a class="page-link" href="#"><</a></li>
                    <li class="page-item active" ><a class="page-link" href="#">1</a></li>
                    <li class="page-item" ><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">></a></li>
                </ul>
        </div>
        
        <script>
            function buka(id){
                window.location.href = "news-detail.php?id=" + id;
            }
        </script>
    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>