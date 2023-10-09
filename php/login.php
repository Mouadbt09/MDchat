<?php 
    session_start();

    include_once "connect.php";

    $mail=$_POST['email'];
    $pass=$_POST['pass'];

    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $req=mysqli_query($conn,"SELECT email from `user` where email='{$mail}'");
        if(mysqli_num_rows($req)>0){
            
            $req2=mysqli_query($conn,"SELECT * from `user` where email='{$mail}'");
            while($rows=mysqli_fetch_array($req2)){
                if($rows['password']==$pass){
                    $_SESSION['uid']=$rows['id'];
                    $stattus="Active";
                    mysqli_query($conn,"UPDATE `user` SET stattus='Active' where id='{$rows['id']}'");
                    header('location:../chat.php');
                }
                else{
                    $_SESSION['login'] ="password is incorrect";
                    header('location:../login.php');

                }
            } 
        }
        else
        {

            $_SESSION['login']= "$mail does not exists, enter another email or sign up";
            header('location:../login.php');

        }
    }
    else{
        $_SESSION['login']= "$mail is invalid";
        header('location:../login.php');
    }

?>