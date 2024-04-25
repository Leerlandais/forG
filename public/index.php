<?php

session_start();

require_once "../config.php";

try{

    $db = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=". DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT , DB_LOGIN, DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);

}catch(Exception $e){
    die($e->getMessage());
}


require_once "../model/adminModel.php";
require_once "../model/ourdatasModel.php";
require_once "../controller/publicControl.php";
require_once "../controller/adminControl.php";


if (isset($_GET["page"])) {
    switch ($_GET["page"]) {
        case "bienvenue" :
            include ("../view/private/admin.homepage.html.php");
            break;
    
 
    }
    
}else if (isset($_GET["connect"])) {
    include ("../view/public/connect.view.html.php");
   
}else if 
    (isset($_GET["bienvenue"])) {
        include ("../view/private/admin.homepage.html.php");
    
} else
{
    include ("../view/public/homepage.view.html.php");
}

/*
if (isset($_GET["bienvenue"])) {
    include ("../view/private/admin.homepage.html.php");
}else {
  //  include("../view/public/homepage.view.html.php");
}
*/

/*                  PAS IF - ON LES INCLURE EN HAUT
if(isset($_SESSION['login'])){

    require_once "../controller/adminControl.php";

}else{

    require_once "../controller/publicControl.php";
}
*/
$db = null;