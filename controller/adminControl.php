<?php

$ourDatas = getAllOurdatas($db); 



if(isset($_GET['disconnect']))  {

     disconnectAdministrator();
     header("Location: ./");
//      include("../model/adminModel.php");  déjà inclus via index.php
     die();
    }   // {} oublié


if(isset($_GET['update'])&&ctype_digit($_GET['update'])){

    $idUpdate = (int) $_GET['update'];

    if(isset(
        $_POST['title'],
        $_POST['ourdesc'],
        $_POST['latitude'],
        $_POST['longitude']
    )){
        $idgeoloc = $idUpdate;
        $title = htmlspecialchars(strip_tags(trim($_POST['title'])),ENT_QUOTES);
        $description = htmlspecialchars(trim($_POST['ourdesc']),ENT_QUOTES);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];

        $insert = addOurdatas($db,$idgeoloc,$title,$description,$latitude, $longitude);

        if($update===true){
            header("Location: ./");
            exit();
        }elseif($update===false){
            $errorUpdate = "Cet article n'a pas été modifié";
        }else{
            $errorUpdate = $update;
        }
}

$updateDatas =  updateOurdatasByID($db,$titre,$description,$latitude,$longitude,$idourdatas);

include "../view/private/admin.insert.html.php";

die();
}



if(isset($_GET['insert'])){

    if(isset(
        $_POST['title'],
        $_POST['idourdatas'],
        $_POST['ourdesc'],
        $_POST['latitude'],
        $_POST['longitude']
    )){

        $title = htmlspecialchars(strip_tags(trim($_POST['title'])),ENT_QUOTES);
        $ourDatas = htmlspecialchars(strip_tags(trim($_POST['idourdatas'])),ENT_QUOTES);
        $description = htmlspecialchars(trim($_POST['ourdesc']),ENT_QUOTES);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];

        $insert = updateOurDatasByID($db,$ourDatas,$title,$description,$latitude,$longitude);

        if($insert === true){
            header("Location: ./");
            exit();
           }
    
        }


    include "../view/private/admin.insert.html.php";

    die();
}

if(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){

    $idDelete = (int) $_GET['delete'];
    if(isset($_GET['ok'])){
        $delete = deleteOneDatasByID($db, $idDelete);
        if($delete===true){
            header("Location: ./");
            exit();
        }elseif($delete===false){
            $error = "Problème avec cette suppression";
        }else{
            $error = $delete;
        }
    }
        $getOneData = getOneDatasByID($db, $idDelete);
        
    }
   










