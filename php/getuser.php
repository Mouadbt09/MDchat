<?php  
    session_start();
    include_once "connect.php";
    $mes="";
    $idu=$_POST['userid'];
    $req=mysqli_query($conn,"SELECT * from `user` where id = '{$idu}'");
        if(mysqli_num_rows($req)>0){
            while($row=mysqli_fetch_assoc($req)){
                $mes.='
                    <i class="back" onclick="f2()">
                        <img width="30" height="30" src="https://img.icons8.com/ios-filled/30/back.png" alt="back"/>
                    </i>
                    <img src="userimg/'.$row['imgname'].'" alt="">
                    <div>
                        <h3>'.$row['fname'].' '.$row['lname'].'</h3>
                        <p>'.$row['stattus'].'</p>
                        <b class="rcid" style="display:none">'.$row['id'].'</b>
                    </div>
                ';
            }
        }
        else{
           $mes='
                <i class="back" onclick="f2()">←</i>
                <img src="userimg/defaultimg.jpg" alt="">
                <div>
                    <h3></h3>
                    <p></p>
                </div>';
        }
            
        echo $mes;



?>