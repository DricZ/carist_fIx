<!DOCTYPE html>
<html lang="en">

<style>
/* FOOTER */
.logo-footer{
    width: 50px;
    position: relative;
}
</style>

<footer id="contactus" class="contain py-4 px-5 ft-desktop" style="z-index:2000; background-color:#2B388F">
    <!-- DESKTOP VIEW -->
    <div class="row">

        <div class="col-2 mt-2">
            <h5 style="color:white; font-family: 'Merriweather'">CONTACT US</h5>
            <div class="contact row justify-content-center">
                <div class="col-12 mt-2"><a style="color: white" class="yess" target="_blank" href="#" style="text-decoration: none;">FAQ</a>
                </div>
                <div class="col-12 mt-2"><a style="color: white" class="yess" target="_blank" href="#" style="text-decoration: none;">Terms & Conditions</a>
                </div>
            </div>    
        </div>
        <div class="col-3 mt-2 mb-1">
            <h5 style="color:white; font-family: 'Merriweather'" >FIND US</h5>
            <div class="menu row">
                <div class="col-1 mt-2 m-1"><a class="" target="_blank" href="#" style="text-decoration: none;"><i class="fab fa-instagram pr-1" style="color: white; font-size: 17pt;"></i></a></div>
                <div class="col-2 mt-2 m-1 mb-4"><a class="" target="_blank" href="#" style="text-decoration: none;"><i class="fab fa-facebook-f pr-1" style="color: white; font-size: 17pt; border: 1px white"></i></a></div>
            </div>

            <div class="menu row" style="width: 85%">
                <div class="card mt-1 p-2" style="">
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
            <p style="color:white; float:right; font-size: 24px">Ikuti berita dan update kami</p>
            <form action="#">
                <div class="input-group" style="width: 20vw; float: right;">
                    <input type="email" class="form-control" id="email" placeholder="Write email here..." name="email" style="height: 55px">
                    <div class="input-group-append">
                        <button class="" style="width: 55px; height: 55px; background-color: #818FEC;">
                            <span class="carousel-control-next-icon" style="color:#2B388F"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</footer>

<!-- MOBILE VIEW -->
<footer id="contactus" class="contain py-4 px-5 ft-mobile" style="z-index:2000; background-color:#2B388F">
    <center>
        <div class="row ft-mobile mb-5 mt-3">
            <h5 style="color:white; font-family: 'Merriweather'">Contact Us</h5>
            <div class="contact row justify-content-center">
                <div class="col-12 mt-2"><a style="color: white" class="yess" target="_blank" href="#" style="text-decoration: none;">FAQ</a>
                </div>
                <div class="col-12 mt-2"><a style="color: white" class="yess" target="_blank" href="#" style="text-decoration: none;">Terms & Conditions</a>
                </div>
            </div>    
        </div>

        <div class="row ft-mobile">
            <h5 style="color:white; font-family: 'Merriweather'">Find Us</h5>
        </div>

        <div class="row" style="justify-content: center;">
            <div class="col-2 mt-2">
                <i class="fab fa-instagram pr-1" style="color: white; font-size: 30pt;"></i></a>
            </div>
            <div class="col-2 mt-2">
                <i class="fab fa-facebook-f pr-1" style="color: white; font-size: 30pt; border: 1px white"></i></a>
            </div>    
        </div>

        <div class="row ft-mobile" style="width: 85%; margin-top: 80px">
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

        <h5 style="margin-top: 50px; color: white">Ikuti berita dan update kami</h5>

        <div class="row ft-mobile mb-5" style="width: 85%; margin-top: 30px">
            
                <div class="input-group">
                    <form action="./admin/sys/save_email.php" method="post">
                        <input type="email" class="form-control" id="email" placeholder="Write email here..." name="email" style="height: 55px">
                        <div class="input-group-append">
                            <button type="submit" style="width: 55px; height: 55px; background-color: #818FEC;">
                                <span class="carousel-control-next-icon" style="color:#2B388F"></span>
                            </button>
                        </div>
                    </div>
            </form>
        </div>
        
    </center>
</footer>