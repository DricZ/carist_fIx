<?php
        require_once 'include.php';
        require "./admin/sys/connect.php";
        //AutoFill
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        $products = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $relative = "../img/PRODUK/";
                $img = $row['img'];
                $path = $relative . $img;
                $nama = $row['nama'];
                array_push($products, $nama);
                $deskripsi = $row['deskripsi'];
                $kandungan = $row['kandungan'];
                $cara_pakai = $row['cara_pakai'];
                $bpom = $row['bpom'];
                //echo "<img src='$path' width='400'>";
                //echo "<h2>$nama</h2>";
            }
        }
        //Convert to JS Array
        $js_products = json_encode($products);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PT. United Farmatic Indonesia</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="icon" href="./img/Logo_UFI.png" type="image/x-icon">

        <style>
            .container{
                padding: 50px;
            }

            .mv{
                display: none;
                width: 100%;
                float: right;
            }

            hr{
                border: 0.8px;
                color: #818FEC;
            }

            /* HEADER */
            .header{
               z-index: 1; 
            }

            .logo{
                position: relative;
            }

            .logo.kiri{
                width: 9vw;
                margin: 30px;
                /* left: 50%; */
            }

            .logo.tengah{
                width: 35vw;
                margin: 15px;
                margin-top: 10px;
            }

            .nav-color{
                color: #818FEC;
            }
            
            .nav-hd{
                margin-left: 10px;
                margin-right: 10px;
            }

            .nav-mv{
                margin: 30px; 
                margin-left: 0;
                display: none;
            }

        </style>
        <style>
            * {
            box-sizing: border-box;
            }

            body {
            /* font: 16px Arial;   */
            }

            /*the container must be positioned relative:*/
            .autocomplete {
            position: relative;
            display: inline-block;
            }

            input {
            /* border: 1px solid transparent; */
            /* background-color: #f1f1f1; */
            padding: 10px;
            font-size: 16px;
            }

            input[type=text] {
            /* background-color: #f1f1f1; */
            width: 100%;
            }

            input[type=submit] {
            background-color: DodgerBlue;
            color: #fff;
            cursor: pointer;
            }

            .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 40px;
            left: 0;
            right: 0;
            }

            .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff; 
            border-bottom: 1px solid #d4d4d4;
            }

            /*when hovering an item:*/
            .autocomplete-items div:hover {
            background-color: #e9e9e9; 
            }

            /*when navigating through the items using the arrow keys:*/
            .autocomplete-active {
            background-color: DodgerBlue !important; 
            color: #ffffff; 
            }
        </style>
    </head>

    <body>

            <!-- HEADER -->
        
        <!-- DESKTOP VIEW -->
        <nav class="navbar navbar-expand-sm justify-content-center divMobile">
            <div class="container-fluid header justify-content-center" style="background-color: white">

                <!-- HEADER -->
                <div class="row" style="width:100%">
                    <div class="col-sm-1 divMobile">
                    </div>
                    
                    <!-- LOGO -->
                    <div class="col-sm-2 divMobile" onClick="window.location.href = 'index.php';" style="cursor: pointer;" style="cursor: pointer;">
                        <img class="logo kiri" src="./img/Logo_UFI.png" alt="PT. United Farmatic Indonesia">
                    </div>
                    
                    <!-- HOME PRODUCT DLL -->
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12" onClick="window.location.href = 'index.php';" style="cursor: pointer;"
onClick="window.location.href = 'index.php';" style="cursor: pointer;">
                                    <center>
                                        <img class="logo tengah" style="cursor: pointer;" src="./img/Nama PT.png" alt="PT. United Farmatic Indonesia" style="z-index: -1;">
                                        <img class="mobile" style="cursor: pointer;" src="./img/Artboard 1 copy.png" alt="PT. United Farmatic Indonesia">
                                    </center>
                            </div>
                        </div>

                        <div class="row" style="margin-top: -30px">
                            <div class="col-sm-12" >
                                <div class="collapse navbar-collapse navbar-expand-sm justify-content-center">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" href="./"><b class="nav-color">HOME</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" style="margin-left: 20px" href="product.php"><b class="nav-color">PRODUCT</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" style="margin-left: 20px" href="about_us.php"><b class="nav-color">ABOUT US</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" style="margin-left: 20px" href="news.php"><b class="nav-color">NEWS</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" style="margin-left: 20px" href="career.php"><b class="nav-color">CAREER</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link nav-hd" href="contact_us.php"><b class="nav-color">CONTACT US</b></a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 right" style="display:flex; align-items: end;">
                        <form method="GET" action="" autocomplete="off">
                            <div class="input-group">
                                <div id="navbar-search-autocomplete" class="form-outline autocomplete" style="height: 0; width: 80%">
                                    <input type="text" name="search" id="form1" class="form-control anu3" placeholder="Find products, series,...">
                                </div>
                                <button type="submit" class="btn btn-primary search-icon">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form> 
                    </div> 
                </div>
            </div>    
        </nav>

        <!-- MOBILE VIEW -->
        <nav class="navbar navbar-expand-lg navbar-light nav-mv">
            <div class="container-fluid">
                <div class="row">
                    <button style="    border: 0;
    width: 10%;
    padding: 0;
    margin-left: 10px;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style="width: 25px"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="width: 20%;
    padding: 0;"><img class="mv" onClick="window.location.href = 'index.php';" style="cursor: pointer;" style="cursor: pointer;" src="./img/Logo_UFI.png" alt="PT. United Farmatic Indonesia"></a>

                    <div class="col-sm-3" style="display: flex;
                        align-items: center;
                        width: 60%;
                        padding: 0;
                        justify-content: center;">
                        <form method="GET" action="" autocomplete="off">
                            <div class="input-group">
                                <div id="navbar-search-autocomplete" class="form-outline autocomplete" style="height: 0; width: 80%">
                                    <input type="text" id="form1" name="search" class="form-control anu3" placeholder="Find products, series,...">
                                </div>
                                <button type="submit" class="btn btn-primary search-icon">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                        
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="border: 0">
                        <ul class="navbar-nav">
                            <li class="nav-item nav-hd">
                                <a class="nav-link" href="index.php"><b class="nav-color">HOME</b></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-hd" href="product.php"><b class="nav-color">PRODUCT</b></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-hd" href="about_us.php"><b class="nav-color">ABOUT US</b></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-hd" href="news.php"><b class="nav-color">NEWS</b></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-hd" href="career.php"><b class="nav-color">CAREER</b></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-hd" href="contact_us.php"><b class="nav-color">CONTACT US</b></a>
                            </li>
                        </ul>
                    </div>

                    
                </div> 
            </div>
        </nav>
        
        <script>
            function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }
            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
            }

            /*An array containing all the country names in the world:*/
            var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
            <?php echo "var products = ".$js_products.";\n";  ?> 
            <?php //echo "var category = ".$js_category.";\n";  ?> 
            console.log(products);
            /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
            autocomplete(document.getElementById("form1"), products);
            autocomplete(document.getElementById("category"), category);
        </script>
    </body>
</html>