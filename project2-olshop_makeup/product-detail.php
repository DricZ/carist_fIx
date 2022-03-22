<?php
        require_once 'include.php';
        require_once 'header.php';
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
            <div class="row">
                <div class="col-4">
                    <center>
                        <div class="row">
                            <div class="col-12">
                                <img class="p-foto" src="./img/PRODUK/Alfacid AHA _ BHA pore serum.jpg">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <img class="p-lain" src="./img/PRODUK/Acne Loose Powder Lo1.jpg">

                                <img class="p-lain" src="./img/PRODUK/Acne Skin Face Toner.jpg">   

                                <img class="p-lain" src="./img/PRODUK/Alfacid Face Toner.jpg">
                            </div>
                        </div>
                    </center>    
                </div>
                <div class="col-8">
                    <h3><b>Acne Face Wash</b></h3>
                    <p>
                        Sabun scrub untuk membantu membersihkan kulit dari kotoran yang menempel
                        dan membantu mengangkat sel kulit mati sehingga kulit tampak lebih bersih dan
                        halus.
                    </p><br>

                    <a onclick="enlarge('ing', 'ingi')">
                        <b>Ingredients</b>
                        <i class="fa-solid fa-angle-right" id="ingi"></i>
                    </a>
                    <p id="ing" hidden>
                        gatau mo diisi apa
                    </p>
                    <br><br>

                    <a onclick="enlarge('cp', 'cpi')">
                        <b>Cara penggunaan</b>
                        <i class="fa-solid fa-angle-right" id="cpi"></i>
                    </a>
                    <p id="cp" hidden>
                        gatau mo diisi apa v2.0
                    </p><br>

                    <hr/>

                    <p>
                        Basahi kulit dengan air, oleskan scrub cream sambil digosok lembut pada kulit,
                        kemudian bilas dengan air hingga bersih.
                    </p>
                </div>
            </div>

        </div>

        <script>
            function enlarge(id, iid){
                x = document.getElementById(id);
                y = document.getElementById(iid);
                console.log(y);

                if (x.hasAttribute('hidden')) {
                    x.removeAttribute('hidden');
                    y.classList.remove('fa-angle-right');
                    y.classList.add('fa-angle-down');
                } else {
                    x.setAttribute('hidden', 'hidden');
                    y.classList.remove('fa-angle-down');
                    y.classList.add('fa-angle-right');
                }
            }
        </script>
    
    </body>

    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
</html>