<?php 
session_start();
include_once "connect.php";
if(isset($_SESSION['uid']))
{
    $req=mysqli_query($conn,"UPDATE `user` SET stattus='unactive' where id='{$_SESSION['uid']}'");
    if($req){
        session_destroy();
        header('location:../login.php');
    }
}

?>