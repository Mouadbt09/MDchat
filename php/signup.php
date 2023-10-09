<?php 
    session_start();

    include_once "connect.php";

    $ex=0;
    $fn=$_POST['fname'];
    $ln=$_POST['lname'];
    $mail=$_POST['email'];
    $pass=$_POST['pass'];
    

    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $req=mysqli_query($conn,"SELECT email from `user` where email='{$mail}'");
        if(mysqli_num_rows($req)>0){
            $_SESSION['signup'] = "$mail already exists, enter another email or login";
            header('location:../login.php');
        }
        else
        {
            if(isset($_FILES['userimage'])){
                $imgname=$_FILES['userimage']["name"];
                $imgtmp=$_FILES['userimage']["tmp_name"];
                $imgtypear=explode('.',$imgname);
                $imgtype=end($imgtypear);
                echo $imgname;
                if($imgtype!="png" && $imgtype!="jpg" && $imgtype!="jpeg"){
                    $_SESSION['signup'] = "Error image must be png, jpg or jpeg";
                    header('location:../login.php');
                }
                else{
                    $time=time();
                    $imgname2=$time.$imgname;
                    if(move_uploaded_file($imgtmp,"../userimg/".$imgname2)){
                        $status="Active";
                        $requ=mysqli_query($conn,"INSERT INTO `user`(`fname`, `lname`, `email`, `password`, `imgname`, `stattus`) VALUES ('$fn','$ln','$mail','$pass','$imgname2','$status')");
                        if($requ){
                            $req2=mysqli_query($conn,"SELECT * from `user` where email='{$mail}'");
                            while($rows=mysqli_fetch_array($req2)){
                                $_SESSION['uid']=$rows['id'];
                                header('location:../chat.php');
                            } 
                        }
                        else{
                            $_SESSION['signup'] = "Some thing went wrong try again";
                            header('location:../login.php');
                        }
                        
                    }
                }
            }

        }
    }
    else{
        $_SESSION['signup'] = "$mail is invalid";
        header('location:../login.php');
    }

?>