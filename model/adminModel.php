<?php

function connectAdministrator(PDO $db, string $user, string $password) : bool|string 
{
    $sql="SELECT * FROM `administrator` WHERE `username` = ?";

    $prepare = $db->prepare($sql);

    try{
        $prepare->execute([$user]);
        if($prepare->rowCount()===0) return false;
        $result = $prepare->fetch();

        if(password_verify($password, $result['passwd'])){

            $_SESSION = $result;
            
            unset($_SESSION['passwd']);
            
            return true;
        }
       
        return false;

    }catch(Exception $e){
        return $e->getMessage();
}
}

function disconnectAdministrator(): bool
{
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    header("Location: ./");
    die();
}

