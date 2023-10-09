<?php 
session_start();
include_once "connect.php";
$mes="";
if(!isset($_SESSION['uid']))
{
    header('location:../login.php');
}else{
        $sid= $_POST['sender_id'];
        $rid=  $_POST['receiver_id'];
        $req=mysqli_query($conn,"SELECT * from `messages`where rid='{$rid}' and sid='{$sid}' or sid='{$rid}' and  rid='{$sid}';");
        if(mysqli_num_rows($req)>0)
        {
            while($row=mysqli_fetch_assoc($req))
            {
                if($row['sid']==$sid)
                {
                    $mes.='
                    <div>
                        <p class="outcoming">
                        '.$row['msg'].'
                        </p>
                    </div>
                    ';
                }
                else
                {
                    $mes.='
                    <div>
                        <p class="incoming">
                        '.$row['msg'].'
                        </p>
                    </div>
                    ';
                }
                
            }
        }
        else
        {
            $mes=0;
        }
        echo $mes;
    }
    







?>