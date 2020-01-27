<?php session_start();
$usertype       =   $_SESSION['logged']['user_type'];
 unset($_SESSION['error']);
 unset($_SESSION['success']);
 unset($_SESSION['logged']);
 if($usertype != "agent"){
    header("location: ../index.php");
 }else{
     header("location: ../../index.php");
 }
 exit();