<?php
    if (isset($_SESSION["userid"]) && isset($_SESSION["username"])){
        $valid = true;
    }else{
        $valid = false;
    }
?>