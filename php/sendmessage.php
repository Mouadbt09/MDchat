<?php 
session_start();
include_once "connect.php";
if(!isset($_SESSION['uid']))
{
    header('location:../login/login.php');
}else{
    $message=$_POST['msg'];
    $sid= $_POST['sender_id'];
    $rid=  $_POST['receiver_id'];
    if(!empty($message)){
        $req=mysqli_query($conn,"INSERT INTO `messages`(`rid`, `sid`, `msg`) VALUES ('{$rid}','{$sid}','{$message}')");
        if($req){
            echo 1;
        }
    }else{
        echo 0;
    }
    
}






?>