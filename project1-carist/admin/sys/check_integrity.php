<?php
    if (isset($_SESSION["userid"]) && isset($_SESSION["username"])){
        $valid = true;
    }else{
        $valid = false;
    }

    $adminAccess = false;
    $headAccess = false;
    $contentwriterAccess = false;
    $designerAccess = false;
    $copywriterAccess = false;
    $operationalAccess = false;
    $marketingAccess = false;


    if($_SESSION['role1'] == "admin" || $_SESSION['role2'] == "admin"){
        $adminAccess = true;
    }
    if($_SESSION['role1'] == "head" || $_SESSION['role2'] == "head"){
        $headAccess = true;
    }
    if($_SESSION['role1'] == "contentwriter" || $_SESSION['role2'] == "contentwriter"){
        $contentwriterAccess = true;
    }
    if($_SESSION['role1'] == "designer" || $_SESSION['role2'] == "designer"){
        $designerAccess = true;
    }
    if($_SESSION['role1'] == "copywriter" || $_SESSION['role2'] == "copywriter"){
        $copywriterAccess = true;
    }
    if($_SESSION['role1'] == "operational" || $_SESSION['role2'] == "operational"){
        $operationalAccess = true;
    }
    if($_SESSION['role1'] == "marketing" || $_SESSION['role2'] == "marketing"){
        $marketingAccess = true;
    }
?>