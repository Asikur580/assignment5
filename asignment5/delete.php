<?php
session_start();
$fp = "data/user.txt";

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
}
$user = array();
if($_GET["id"]>=0){
    $id = $_GET["id"];
    $alluser = file_get_contents($fp);
    $decodeUser = json_decode($alluser,true);
    
    unset($decodeUser[$id]);
    shuffle($decodeUser);
    $data = json_encode($decodeUser);
    array_push($user,file_put_contents($fp, $data, LOCK_EX));
    
    header("Location: role_management.php");
}


?>