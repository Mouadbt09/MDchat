<?php  
    session_start();
    include_once "connect.php";
    $mes="";
    $name=$_POST['s'];
    $you="";
    $req=mysqli_query($conn,"SELECT * from `user` where (id <> '{$_SESSION['uid']}') and (fname  like '%{$name}%' or lname like '%{$name}%')");
        
        if(mysqli_num_rows($req)>0){
            while($row=mysqli_fetch_assoc($req)){
                $mes.='
                <aside onclick="f1(this)">
                    <div>
                        <img src="userimg/'.$row['imgname'].'" alt="">
                        <h3>'.$row['fname'].' '.$row['lname'].'</h3>
                    </div>
                    <i></i>
                    <input type="hidden" class="userid" value='.$row['id'].'>
                </aside>
                ';
            }
        }
        else{
            $mes='
                <aside>
                    <div>
                        <h3>No user found</h3>
                    </div>
                </aside>
            ';
        }
        echo $mes;



?>