

<?php
        require_once 'include.php';
        require_once 'header-pp.php';
        require "admin/sys/connect.php";
        $product_per_page = 16;
        $sidebar = false;

        
        

        $sql = "SELECT * FROM product";
        

        if(isset($_GET['filter']) && $_GET['filter'] != "none"){
            $filter = $_GET['filter'];
            //JIKA SIDEBAR DIPILIH
            if($filter == "BASED ON PRODUCT HIGHLIGHT" || $filter == "BASED ON SKIN TYPE"
                || $filter == "BASED ON SKIN CONDITION" || $filter == "BASED ON ACNE SEVERITY"
                || $filter == "BASED ON PRODUCT TYPE" || $filter == "BASED ON FUNCTION"
                || $filter == "BASED ON BRAND"){
                    $category_array = array();
                    $sidebar = true;
                    //nothing
                    if($filter == "BASED ON PRODUCT HIGHLIGHT"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Best Seller / Recomendation' OR nama='New Arrival'";
                    }else if($filter == "BASED ON SKIN TYPE"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='All Skin Type' OR nama='Normal Skin Type' OR nama='Dry Skin'
                                    OR nama='Oily Skin' OR nama='Sensitive Skin'";
                    }else if($filter == "BASED ON SKIN CONDITION"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Normal Skin Condition' OR nama='Kusam' OR nama='Berjerawat'
                                    OR nama='Aging' OR nama='Kering' OR nama='Inflamasi'";
                    }else if($filter == "BASED ON ACNE SEVERITY"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='All Condition' OR nama='Komedo' OR nama='Papule (Light)'
                                    OR nama='Pustule (Medium)' OR nama='Nodule (Severe)'";
                    }else if($filter == "BASED ON PRODUCT TYPE"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Face Wash' OR nama='Face Cleanser' OR nama='Face Toner'
                                    OR nama='Serum' OR nama='Cream' OR nama='Gel' OR nama='Lotion' OR nama='Body Care' OR nama='Neutralizing'
                                    OR nama='Peeling' OR nama='Decorative'";
                    }else if($filter == "BASED ON FUNCTION"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Sunscreen' OR nama='Moisturizer' OR nama='Brightening'
                                    OR nama='Acne Care' OR nama='Anti Aging' OR nama='Nutritive' OR nama='Conditioning'";
                    }else if($filter == "BASED ON BRAND"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Alfacid' OR nama='Primaderma' OR nama='Hydrosnail'
                                    OR nama='Solasense' OR nama='Kaneira' OR nama='Beaulash' OR nama='Skinisse'";
                    }

                    else if($filter == "BASED ON SKIN TYPE"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='All Skin Type' OR nama='Normal' OR nama='Dry Skin'
                         OR nama='Oily Skin' OR nama='Sensitive Skin'";
                    }

                    else if($filter == "BASED ON SKIN CONDITION"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Normal' OR nama='Kusam' OR nama='Berjerawat'
                         OR nama='Aging' OR nama='Kering' OR nama='Inflamasi'";
                    }

                    else if($filter == "BASED ON ACNE SEVERITY"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='All Condition' OR nama='Komedo' OR nama='Papule (light)'
                         OR nama='Pustule (Medium)' OR nama='Nodule (Severe)'";
                    }

                    else if($filter == "BASED ON PRODUCT TYPE"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Face Wash' OR nama='Face Cleanser' OR nama='Face Toner'
                         OR nama='Serum' OR nama='Cream' OR nama='Gel' OR nama='Lotion' OR nama='Body Care' OR nama='Neutralizing' OR nama='Peeling' OR nama='Decorative'";
                    }

                    else if($filter == "BASED ON FUNCTION"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Sunscreen' OR nama='Moisturizer' OR nama='Brightening'
                         OR nama='Acne Care' OR nama='Anti Aging' OR nama='Nutritive' OR nama='Conditioning'";
                    }

                    else if($filter == "BASED ON BRAND"){
                        $sql2 = "SELECT * FROM category_list WHERE nama='Alfacid' OR nama='Primaderma' OR nama='Hydrosnail'
                         OR nama='Solasense' OR nama='Kaneira' OR nama='Beaulash' OR nama='Skinisse'";
                    }

                    // Get Category ID
                    
                    $result2 = $conn->query($sql2);
                    

                    if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()) {
                            $category_id = $row['id'];
                            array_push($category_array, $row['id']);
                        }
                    }
                    //echo "Category: ".$filter."($category_id)";

                    $sql .= " LEFT JOIN category ON product.id = category.product_id WHERE category.category_id = $category_array[0]";
                    if(count($category_array) > 1){
                        for ($i=1; $i<count($category_array); $i++){
                            $sql .= " OR category.category_id = $category_array[$i]";
                        }
                    }
            }else{
                // Get Category ID
                $sql2 = "SELECT * FROM category_list WHERE nama='$filter'";
                $result2 = $conn->query($sql2);
                

                if ($result2->num_rows > 0) {
                    if($row = $result2->fetch_assoc()) {
                        $category_id = $row['id'];
                    }
                }
                //echo "Category: ".$filter."($category_id)";

                $sql .= " LEFT JOIN category ON product.id = category.product_id WHERE category.category_id = $category_id";
            }
        }else{
            $filter = "none";
        }

        if(isset($_GET['search']) && $_GET['search'] != "none"){
            $search = $_GET['search'];
            $sql = "SELECT * FROM product WHERE nama LIKE '%$search%'";
        }

        

        // Get Total Product Number
        $temp_result = $conn->query($sql);
        $total_product = $temp_result->num_rows;
        $total_page = ceil($total_product/$product_per_page);
        //echo $total_product;
        //echo $total_page;

        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $param1 = ($page-1)*$product_per_page;
            $sql .= " LIMIT";
            $sql .= " $param1, $product_per_page";
        }else{
            $page = 1;
            $sql .= " LIMIT 16";
        }

        $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UFI</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="./css/style.css" rel="stylesheet">

        <style>
            .dropdown-menu {
                overflow: hidden;
                overflow-y: auto;
                max-height: calc(100vh - 150px);
            }
        </style>
    </head>

    <body>
        <hr class="d-index"/>

        
        

        <div class="container-fluid anu2" style="">
            
            <div class="row product-row-1">
                <!-- The sidebar -->
                <div class="col-4 sidebar d-index">
                    <p style="color: white; margin: 20px; margin-top: 40px; font-weight: 600; MARGIN-LEFT: 15px; font-size: 24px">Category</p>

                    <a onclick="openbar('BASED ON PRODUCT HIGHLIGHT', 'bar1', 'bar2', 'bar3', 'bar4', 'bar5', 'bar6', 'bar7')" class="bb">BASED ON PRODUCT HIGHLIGHT</a>
                    <div id="bar1" hidden>
                        <a class="dalem" href="?filter=Best Seller / Recomendation">Best Seller / Recomendation</a>
                        <a class="dalem" href="?filter=New Arrival">New Arrival</a>
                    </div>

                    <a onclick="openbar('BASED ON SKIN TYPE', 'bar2', 'bar1', 'bar3', 'bar4', 'bar5', 'bar6', 'bar7')" class="bb">BASED ON SKIN TYPE</a>
                    <div id="bar2" hidden>
                        <a class="dalem" href="?filter=All Skin Type">All Skin Type</a>
                        <a class="dalem" href="?filter=Normal Skin Type">Normal Skin Type</a>
                        <a class="dalem" href="?filter=Dry Skin">Dry Skin</a>
                        <a class="dalem" href="?filter=Oily Skin">Oily Skin</a>
                        <a class="dalem" href="?filter=Sensitive Skin">Sensitive Skin</a>
                    </div>

                    <a onclick="openbar('BASED ON SKIN CONDITION', 'bar3', 'bar2', 'bar1', 'bar4', 'bar5', 'bar6', 'bar7')" class="bb">BASED ON SKIN CONDITION</a>
                    <div id="bar3" hidden>
                        <a class="dalem" href="?filter=Normal Skin Condition">Normal Skin Condition</a>
                        <a class="dalem" href="?filter=Kusam">Kusam</a>
                        <a class="dalem" href="?filter=Berjerawat">Berjerawat</a>
                        <a class="dalem" href="?filter=Aging">Aging</a>
                        <a class="dalem" href="?filter=Kering">Kering</a>
                        <a class="dalem" href="?filter=Inflamasi">Inflamasi</a>
                    </div>

                    <a onclick="openbar('BASED ON ACNE SEVERITY', 'bar4', 'bar2', 'bar3', 'bar1', 'bar5', 'bar6', 'bar7')" class="bb">BASED ON ACNE SEVERITY</a>
                    <div id="bar4" hidden>
                        <a class="dalem" href="?filter=All Condition">All Condition</a>
                        <a class="dalem" href="?filter=Komedo">Komedo</a>
                        <a class="dalem" href="?filter=Papule (Light)">Papule (light)</a>
                        <a class="dalem" href="?filter=Pustule (Medium)">Pustule (Medium)</a>
                        <a class="dalem" href="?filter=Nodule (Severe)">Nodule (Severe)</a>
                    </div>

                    <a onclick="openbar('BASED ON PRODUCT TYPE', 'bar5', 'bar2', 'bar3', 'bar4', 'bar1', 'bar6', 'bar7')" class="bb">BASED ON PRODUCT TYPE</a>
                    <div id="bar5" hidden>
                        <a class="dalem" href="?filter=Face Wash">Face Wash</a>
                        <a class="dalem" href="?filter=Face Cleanser">Face Cleanser</a>
                        <a class="dalem" href="?filter=Face Toner">Face Toner</a>
                        <a class="dalem" href="?filter=Serum">Serum</a>
                        <a class="dalem" href="?filter=Cream">Cream</a>
                        <a class="dalem" href="?filter=Gel">Gel</a>
                        <a class="dalem" href="?filter=Lotion">Lotion</a>
                        <a class="dalem" href="?filter=Body Care">Body Care</a>
                        <a class="dalem" href="?filter=Neutralizing">Neutralizing</a>
                        <a class="dalem" href="?filter=Peeling">Peeling</a>
                        <a class="dalem" href="?filter=Decorative">Decorative</a>
                    </div>

                    <a onclick="openbar('BASED ON FUNCTION', 'bar6', 'bar2', 'bar3', 'bar4', 'bar5', 'bar1', 'bar7')" class="bb">BASED ON FUNCTION</a>
                    <div id="bar6" hidden>
                        <a class="dalem" href="?filter=Sunscreen">Sunscreen</a>
                        <a class="dalem" href="?filter=Moisturizer">Moisturizer</a>
                        <a class="dalem" href="?filter=Brightening">Brightening</a>
                        <a class="dalem" href="?filter=Acne Care">Acne Care</a>
                        <a class="dalem" href="?filter=Anti Aging">Anti Aging</a>
                        <a class="dalem" href="?filter=Nutritive">Nutritive</a>
                        <a class="dalem" href="?filter=Conditioning">Conditioning</a>
                    </div>

                    <a onclick="openbar('BASED ON BRAND', 'bar7', 'bar2', 'bar3', 'bar4', 'bar5', 'bar6', 'bar1')" class="bb">BASED ON BRAND</a>
                    <div id="bar7" hidden>
                        <a class="dalem" href="?filter=Alfacid">Alfacid</a>
                        <a class="dalem" href="?filter=Primaderma">Primaderma</a>
                        <a class="dalem" href="?filter=Hydrosnail">Hydrosnail</a>
                        <a class="dalem" href="?filter=Solasense">Solasense</a>
                        <a class="dalem" href="?filter=Kaneira">Kaneira</a>
                        <a class="dalem" href="?filter=Beaulash">Beaulash</a>
                        <a class="dalem" href="?filter=Skinisse">Skinisse</a>
                    </div>
                </div>

                <!-- Sidebar Jadi Putih -->
                <script>
                    var selected = $("a:contains('<?=$filter?>')");
                    <?php
                        if ($sidebar){
                    ?>
                        selected.css("background-color", "white");
                        selected.css("color", "black");
                        selected.next().removeAttr("hidden");
                        //console.log(selected.get(0));
                        var id1 = $("#bar1");
                        var id2 = $("#bar2");
                        var id3 = $("#bar3");
                        var id4 = $("#bar4");
                        var id5 = $("#bar5");
                        var id6 = $("#bar6");
                        var id7 = $("#bar7");

                    <?php
                        }else{
                    ?>
                        var parent = selected.parent();
                        parent.removeAttr("hidden");
                        //parent.prev().css("background-color", "white");
                        //parent.prev().css("color", "black");
                        selected.css("background-color", "white");
                        selected.css("color", "black");
                    <?php
                        }
                    ?>
                </script>

<div class="container-fluid m-product pd-mb p-2" style="background-color: #2B388F;align-items: center;">
            <div class="row" style="width: 100%;height: 100%;padding-left: 20px;">
                <ul class="col nav m-product" style="    align-items: center;">
                    <li class="nav-item">
                        <a class="nav-link nav-product" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-product disabled" style="color: white;" href="#">></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-product" href="product.php">Product</a>
                    </li>
                    <?php
                        if(isset($_GET['filter']) && $_GET['filter'] != "none"){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link nav-product disabled" style="color: white; background-color:transparent" href="#">></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-product" style="background-color:transparent" href="?filter=<?=$filter?>" id="mobile"><?=$filter?></a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>

                <div class="col" style="width: 100%;
    text-align: right;
    vertical-align: middle;
    display: contents;">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" style="width: 7%; height: 100%; background-color: transparent;border: 0; margin-right: 10px;">
                        <img id="imgfilter" src="./img/filter-svgrepo-com.svg">
                    </button>
                    <ul class="dropdown-menu">
                        <li><p class="dropdown-header bb" style="color: black;">CATEGORY</p></li>
                        <li><p class="dropdown-header bb" style="font-weight: 700; color: black;">BASED ON PRODUCT HIGHLIGHT</p></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Best Seller / Recomendation">Best Seller / Recomendation</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=New Arrival">New Arrival</a></li><br>

                        <li><p class="dropdown-header bb" style="font-weight: 700; color: black;">BASED ON SKIN TYPE</p></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=All Skin Type">All Skin Type</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Normal Skin Type">Normal Skin Type</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Dry Skin">Dry Skin</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Oily Skin">Oily Skin</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Sensitive Skin">Sensitive Skin</a></li><br>

                        <li><p class="dropdown-header bb" style="font-weight: 700; color: black;">BASED ON SKIN CONDITION</p></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Normal Skin Condition">Normal Skin Condition</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Kusam">Kusam</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Berjerawat">Berjerawat</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Aging">Aging</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Kering">Kering</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Inflamasi">Inflamasi</a></li><br>

                        <li><p class="dropdown-header bb" style="font-weight: 700; color: black;">BASED ON ACNE SEVERITY</p></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=All Condition">All Condition</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Komedo">Komedo</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Papule (Light)">Papule (light)</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Pustule (Medium)">Pustule (Medium)</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Nodule (Severe)">Nodule (Severe)</a></li><br>

                        <li><p class="dropdown-header bb" style="font-weight: 700; color: black;">BASED ON PRODUCT TYPE</p></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Face Wash">Face Wash</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Face Cleanser">Face Cleanser</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Face Toner">Face Toner</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Serum">Serum</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Cream">Cream</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Gel">Gel</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Lotion">Lotion</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Body Care">Body Care</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Neutralizing">Neutralizing</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Peeling">Peeling</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Decorative">Decorative</a></li><br>

                        <li><p class="dropdown-header bb" style="font-weight: 700; color: black;">BASED ON FUNCTION</p></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Sunscreen">Sunscreen</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Moisturizer">Moisturizer</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Brightening">Brightening</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Acne Care">Acne Care</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Anti Aging">Anti Aging</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Nutritive">Nutritive</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Conditioning">Conditioning</a></li><br>

                        <li><p class="dropdown-header bb" style="font-weight: 700; color: black;">BASED ON BRAND</p></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Alfacid">Alfacid</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Primaderma">Primaderma</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Hydrosnail">Hydrosnail</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Solasense">Solasense</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Kaneira">Kaneira</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Beaulash">Beaulash</a></li>
                        <li><a class="dropdown-item dalem" style="color: black; font-weight:normal" href="?filter=Skinisse">Skinisse</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>

                <!-- Page content -->
                <div class="col-8 content product-pp "> 
                    <div class="row mb-pp1" style="">
                        <?php
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $relative = "./img/PRODUK/";
                                    $img = $row['img'];
                                    $path = $relative . $img;
                                    $nama = $row['nama'];
                                    $deskripsi = $row['deskripsi'];
                                    $kandungan = $row['kandungan'];
                                    $cara_pakai = $row['cara_pakai'];
                                    $bpom = $row['bpom'];
                                    $category = "";
                        ?>
                        <div class="col-md-3 col-product-1">
                            <div class="card produk-p">
                                <a href="product-detail.php?name=<?=$nama?>"><img class="" style="width: 100%" src="<?=$path?>" alt="<?=$img?>"></a>
                                <center class="pr hoverable2 anu10"><a class="hoverable2" href="product-detail.php?name=<?=$nama?>" style='font-weight: 600; '><?=$nama?></a></center>
                                <center><p class="anu10" style="color:#a0a0a0"><i>
                                    <?php
                                        //Search Category
                                        $sql2 = "SELECT category.category_id AS category_id, category_list.nama FROM category LEFT JOIN category_list ON category.category_id = category_list.id WHERE product_id = '$id'";
                                        $result2 = $conn->query($sql2);
                        
                                        if ($result2->num_rows > 0) {
                                            $count = $result2->num_rows;
                                            // output data of each row
                                            $x = 1;
                                            while($row2 = $result2->fetch_assoc()) {
                                                $temp = $row2['nama'];
                                                if($x == $count){
                                                    echo "<a class='hoverable1' href='?filter=$temp' style='color:#a0a0a0;'>$temp</a> ";
                                                }else{
                                                    echo "<a class='hoverable1' href='?filter=$temp' style='color:#a0a0a0;'>$temp</a>, ";
                                                }
                                                //echo $count;
                                                //echo $x;
                                                //$category = $category . $temp . ", ";
                                                $x++;
                                            }
                                        }
                                    ?>
                                </i></p></center>
                            </div>
                        </div>
                        <?php  
                                }
                                //Page Bar
                                echo "<ul class='pagination justify-content-center' style='margin:20px 0; padding: 0'>";
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
                                if($page > 1){
                                    $preview = $page-1;
                                    echo "<li class='page-item'><a class='page-link' href='?filter=$filter&page=$preview'><img src='./img/back.png' class='anu11' style=''> </a></li>  ";
                                }
                                for($i=$start;$i<=$end;$i++){
                                    if($i == $page){
                                        echo "<li class='page-item active'><a class='page-link' href='?filter=$filter&page=$i'>$i</a></li>  ";
                                    }else{
                                        echo "<li class='page-item'><a class='page-link' href='?filter=$filter&page=$i'>$i</a></li>  ";
                                    }
                                }
                                //Panah Kanan
                                if($end < $total_page){
                                    $preview = $page+1;
                                    echo "<li class='page-item'><a class='page-link' href='?filter=$filter&page=$preview'><img class='anu12' src='./img/next1.svg' style=''> </a></li> ";
                                }
                                echo "</ul>";
                            }else{
                                echo "<div style='padding-top: 15%'>";
                                echo "<center><h1>No Data</h1></center>";
                                for($i=0;$i<20;$i++){
                                    echo "<br>";
                                }
                                echo "</div>";
                            }
                        ?>
                    </div>

                    <!-- <div class="row center m-produk" style="display: flex">
                        <?php
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $relative = "./img/PRODUK/";
                                    $img = $row['img'];
                                    $path = $relative . $img;
                                    $nama = $row['nama'];
                                    $deskripsi = $row['deskripsi'];
                                    $kandungan = $row['kandungan'];
                                    $cara_pakai = $row['cara_pakai'];
                                    $bpom = $row['bpom'];
                                    $category = "";
                        ?>
                        <div class="col-md-3 col-product-1">
                            <div class="card produk-p">
                                <img class="hoverable" src="<?=$path?>" alt="<?=$img?>" onclick="openProduk('<?=$nama?>')">
                                <center class="pr hoverable"><a href="product-detail.php?name=<?=$nama?>" style='color:black; font-weight: 600; font-size: 16px; text-decoration: underline;'><?=$nama?></a></center>
                                <center><p class="d-index hoverable" style="font-size: 16px"><i>
                                    <?php
                                        //Search Category
                                        $sql2 = "SELECT category.category_id AS category_id, category_list.nama FROM category LEFT JOIN category_list ON category.category_id = category_list.id WHERE product_id = '$id'";
                                        $result2 = $conn->query($sql2);
                        
                                        if ($result2->num_rows > 0) {
                                            // output data of each row
                                            while($row2 = $result2->fetch_assoc()) {
                                                $temp = $row2['nama'];
                                                echo "<a style='hoverable' href='?filter=$temp' style='color:black;'>$temp, </a>";
                                                //$category = $category . $temp . ", ";
                                            }
                                        }
                                    ?>
                                </i></p></center>
                            </div>
                        </div>
                        <?php  
                                }
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
                                if($page > 1){
                                    $preview = $page-1;
                                    echo "<li class='page-item'><a class='page-link' href='?filter=$filter&page=$preview'>< </a></li>  ";
                                }
                                for($i=$start;$i<=$end;$i++){
                                    if($i == $page){
                                        echo "<li class='page-item active'><a class='page-link' href='?filter=$filter&page=$i'>$i</a></li>  ";
                                    }else{
                                        echo "<li class='page-item'><a class='page-link' href='?filter=$filter&page=$i'>$i</a></li>  ";
                                    }
                                }
                                //Panah Kanan
                                if($end < $total_page){
                                    $preview = $page+1;
                                    echo "<li class='page-item'><a class='page-link' href='?filter=$filter&page=$preview'>> </a></li> ";
                                }
                                echo "</ul>";
                            }else{
                                echo "<div style='padding-top: 15%'>";
                                echo "<center><h1>No Data</h1></center>";
                                for($i=0;$i<20;$i++){
                                    echo "<br>";
                                }
                                echo "</div>";
                            }
                        ?>
                    </div> -->
                </div>

            </div>
        </div>

        <script>
        function openbar(param, id1, id2, id3, id4, id5, id6, id7) {
            let link = 'product.php?filter=' + param;
            window.location.href = link;
            var a = document.getElementById(id1);
            var b = document.getElementById(id2);
            var c = document.getElementById(id3);
            var d = document.getElementById(id4);
            var e = document.getElementById(id5);
            var f = document.getElementById(id6);
            var g = document.getElementById(id7);
            if (a.hasAttribute('hidden')) {
                a.removeAttribute('hidden');
                b.setAttribute('hidden', 'hidden');
                c.setAttribute('hidden', 'hidden');
                d.setAttribute('hidden', 'hidden');
                e.setAttribute('hidden', 'hidden');
                f.setAttribute('hidden', 'hidden');
                g.setAttribute('hidden', 'hidden');
            } else {
                a.setAttribute('hidden', 'hidden');
            }
        }

        function openProduk(nama){
            let link = 'product-detail.php?name=' + nama;
            window.location.href = link;
        }

        </script>

        

    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>