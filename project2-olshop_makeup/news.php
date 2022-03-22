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
        
        <div class="container" style="">
            <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        $img = "img/news/".$row['img'];
                        $wrap_limit = 550;
                        $news = $row['news'];
                        $news = strlen($news) > $wrap_limit ? substr($news,0,$wrap_limit)."..." : $news;
            ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?=$img?>" style="width: 20vw; height: 30vh; border-radius: 20px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <h3><?=$title?></h3>
                    <?=$news?>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
        </div>
        
    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>