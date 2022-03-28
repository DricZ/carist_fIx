<?php
        require_once 'include.php';
        require_once 'header.php';
        require "admin/sys/connect.php";

        $sql = "SELECT * FROM news";
        $result = $conn->query($sql);
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $total_page = ceil(($result->num_rows)/8);
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
            <div class="row row-news mt-5" onclick="buka(<?=$id?>)" style="margin-bottom: 30px; width: 110%; cursor: pointer;">
                <div class="col-md-5 right d-index">
                    <img src="<?=$img?>" style="width: 70%; border-radius: 5px; object-fit: cover;">
                </div>

                <div class="col-md-5 p-0 m-index">
                    <img src="<?=$img?>" style="width: 100%; object-fit: cover;">
                </div>

                <!-- aslie 7 -->
                <div class="col-md-5 d-index">
                    <h3 style="font-family: 'Merriweather'"><b><?=$title?></b></h3>
                    <p style="font-size: 16px"><?=$news." read more"?></p><br>
                    <p style="font-size: 16px; font-weight: normal"><?=$date?></p>
                </div>

                <div class="col-md-5 m-index p-5">
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

                <!-- <ul class="pagination justify-content-center">
                    <li class="page-item" ><a class="page-link" href="#"><img src='./img/back.png' style='width: 10px; height: 20px'></a></li>
                    <li class="page-item active" ><a class="page-link" href="#">1</a></li>
                    <li class="page-item" ><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><img src='./img/next1.svg' style='width: 20px; height: 20px'></a></li>
                </ul> -->
                <?php
                    //Page Bar
                    echo "<ul class='pagination justify-content-center' style='margin:20px 0'>";
                    $jumlah_no = 3;
                    //Grouping
                    if($page%3 == 0){
                        $group = $page/$jumlah_no;
                    }else{
                        $group = floor($page/$jumlah_no) + 1;
                    }
                    //Start Number
                    $start = ($group-1)*3+1;
                    $end = $start+($jumlah_no-1);
                    if($end > $total_page){
                        $end = $total_page;
                    }
                    // Panah Kiri
                    if($start > $jumlah_no){
                        $preview = $start-1;
                        echo "<li class='page-item'><a class='page-link' href='?page=$preview'>< </a></li>  ";
                    }
                    for($i=$start;$i<=$end;$i++){
                        if($i == $page){
                            echo "<li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>  ";
                        }else{
                            echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>  ";
                        }
                    }
                    //Panah Kanan
                    if($end < $total_page){
                        $preview = $end+1;
                        echo "<li class='page-item'><a class='page-link' href='?page=$preview'>> </a></li> ";
                    }
                    echo "</ul>";
                ?>
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