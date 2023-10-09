<?php  
    session_start();
    include_once "connect.php";
    $mes="";
    $you="";
    $req=mysqli_query($conn,"SELECT * from `user` where id <> '{$_SESSION['uid']}'");
    if(mysqli_num_rows($req)>0){
        while($row=mysqli_fetch_assoc($req)){
            $req2 = mysqli_query($conn, "SELECT * FROM `messages` WHERE (rid = '{$_SESSION['uid']}' AND sid = '{$row['id']}') OR (sid = '{$_SESSION['uid']}' AND rid = '{$row['id']}') ORDER BY id DESC LIMIT 1;");
            $que=mysqli_fetch_assoc($req2);
            if(mysqli_num_rows($req2)>0){
                $res=$que['msg'];
                (strlen($res)>28)? $res2=substr($res,0,28).'...': $res2=$res;
                ($_SESSION['uid']==$que['sid']) ? $you='You: ' : $you="";
            }else{
                $res2="";
                $you="";
            }
            $mes= $mes.'
                <aside onclick="f1(this)">
                    <div>
                        <img src="userimg/'.$row['imgname'].'" alt="">
                        <span>
                            <h3>'.$row['fname'].' '.$row['lname'].'</h3>
                            <p>'.$you .' '.$res2.'</p>
                        </span>
                    </div>
                    <i></i>
                    <input type="hidden" class="userid" value='.$row['id'].'>
                </aside>
            ';
        }
    }
    else{
        $mes="No users available right now!";
    }
    echo $mes;
?>