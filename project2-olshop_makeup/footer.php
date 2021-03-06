<!DOCTYPE html>
<html lang="en">

<style>
/* FOOTER */
.logo-footer{
    width: 50px;
    position: relative;
}


.custom-search {
  position: relative;
  width: 300px;
}
.custom-search-input {
  width: 100%;
  padding: 10px 100px 10px 20px; 
  line-height: 1;
  box-sizing: border-box;
  outline: none;
  border-radius: 0;
}
.custom-search-botton {
  position: absolute;
  right: 3px; 
  top: 3px;
  bottom: 3px;
  outline: none;
  margin: 0;
  padding: 0 10px;
  z-index: 2;
  border: 0;
}
</style>

<footer id="contactus" class="contain py-4 px-5 ft-desktop" style="z-index:2000; background-color:#2B388F">
    <!-- DESKTOP VIEW -->
    <div class="row">

        <div class="col-2 mt-2">
            <h5 style="color:white; font-family: 'Merriweather'">CONTACT US</h5>
            <div class="contact row justify-content-center">
                <div class="col-12 mt-2"><a style="color: white" class="yess" href="faq.php" style="text-decoration: none;">FAQ</a>
                </div>
                <div class="col-12 mt-2"><a style="color: white" class="yess" href="tnc.php" style="text-decoration: none;">Terms & Conditions</a>
                </div>
            </div>    
        </div>
        <div class="col-3 mt-2 mb-1">
            <h5 style="color:white; font-family: 'Merriweather'" >FIND US</h5>
            <div class="menu row">
                <div class="col-1 mt-2 m-1">
                    <a class="" target="_blank" href="https://www.instagram.com/ufi.indonesia/" style="text-decoration: none;"><i class="fab fa-instagram pr-1" style="color: white; font-size: 17pt;"></i></a>
                </div>
                <div class="col-2 m-1 mb-4" style="margin-top: 5px !important">
                <a class="" target="_blank" href="https://wa.me/6281328367388" style="text-decoration: none;"><img src="./img/whatsapp.png" style="width: 25px;"></a>                
                </div>
            </div>

            <div class="menu row" style="width: 85%">
                <div class="card mt-1 p-2" style="width: 220px">
                    <div class="row">
                        <div class="col-4 text-center">
                            <img class="logo-footer" src="./img/Logo-Halal-PNG-Terbaru.png">
                        </div>
                        <div class="col-4 text-center">
                            <img class="logo-footer" src="./img/gmp-quality-logo-029EAE8B9B-seeklogo.com-removebg-preview.png">
                        </div>
                        <div class="col-4 text-center">
                            <img class="logo-footer" src="./img/LOGO_BPOM-e1611338664504.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            
        </div>

        <div class="col-4 justify-content-right" style="">
            <div class="row justify-content-right">
                <p style="color:white; float:right; font-size: 20px; text-align: right;">Ikuti berita dan update kami</p>
            </div>
            <div class="row justify-content-right" >
                <form action="./admin/sys/save_email.php" style="justify-content: right;" method="post">
                    <div class="input-group " style="width: 265px; float: right; ">
                        <input type="email" class="form-control custom-search-input" id="email" placeholder="Write email here..." name="email" style="height: 55px" required>      
                        <button class="next-icon1 custom-search-botton" style="width: 55px; height: 50px;">
                        </button>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>

<!-- MOBILE VIEW -->
<footer id="contactus" class="contain py-4 px-5 ft-mobile" style="z-index:2000; background-color:#2B388F">
    <center>
        <div class="row ft-mobile mb-5 mt-3">
            <h5 style="color:white; font-family: 'Merriweather'">Contact Us</h5>
            <div class="contact row justify-content-center">
                <div class="col-12 mt-2"><a style="color: white" class="yess" href="faq.php" style="text-decoration: none;">FAQ</a>
                </div>
                <div class="col-12 mt-2"><a style="color: white" class="yess" href="tnc.php" style="text-decoration: none;">Terms & Conditions</a>
                </div>
            </div>    
        </div>

        <div class="row ft-mobile">
            <h5 style="color:white; font-family: 'Merriweather'">Find Us</h5>
        </div>

        <div class="row" style="justify-content: center;">
            <div class="col-1 mt-2 m-1">
                <a class="" target="_blank" href="https://www.instagram.com/ufi.indonesia/" style="text-decoration: none;"><i class="fab fa-instagram pr-1" style="color: white; font-size: 17pt;"></i></a>
            </div>
            <div class="col-2 m-1 mb-4" style="margin-top: 5px !important">
                <a class="" target="_blank" href="https://wa.me/6281328367388" style="text-decoration: none;"><img src="./img/whatsapp.png" style="width: 25px;"></a>                
            </div>    
        </div>

        <div class="row ft-mobile" style="width: 85%; margin-top: 60px;">
            <div class="card mt-1 p-2" style="border-radius: 10px">
                <div class="row">
                    <div class="col-4 text-center">
                        <img class="logo-footer" src="./img/Logo-Halal-PNG-Terbaru.png">
                    </div>
                    <div class="col-4 text-center">
                        <img class="logo-footer" src="./img/gmp-quality-logo-029EAE8B9B-seeklogo.com-removebg-preview.png">
                    </div>
                    <div class="col-4 text-center">
                        <img class="logo-footer" src="./img/LOGO_BPOM-e1611338664504.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 justify-content-right mt-4" style="width: 100%">
            <div class="row justify-content-right">
                <p style="color:white; float:right; font-size: 20px;">Ikuti berita dan update kami</p>
            </div>
            <div class="row justify-content-right" >
                <form action="./admin/sys/save_email.php" style="justify-content: right;" method="post">
                    <div class="input-group " style="width: 265px">
                        <input type="email" class="form-control custom-search-input" id="email" placeholder="Write email here..." name="email" style="height: 55px" required>      
                        <button class="next-icon1 custom-search-botton" style="width: 55px; height: 50px;">
                        </button>  
                    </div>
                </form>
            </div>
        </div>
        
    </center>
</footer>