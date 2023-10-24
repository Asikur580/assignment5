<?php
session_start();
    if(isset($_SESSION["role"])){
        $role = $_SESSION["role"];
        if($role == "admin"){
        header("Location: admin_home.php");
        }else if($role == "user"){
            header("Location: user_home.php");
        }elseif($role == "manager"){
            header("Location: manager_home.php");
        }
    }else{
        header("Location: login.php");
    }
?>