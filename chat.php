<?php 
    // session_start();
    include 'header.php'; 
    include 'php/connect.php';
    if(!isset($_SESSION['uid']))
    {
        header('location:login.php');
    }
?>

    <div class="chatbg"></div>
    <div class="chat">
        <div class="users">
            <div class="user">
                <aside>
                    <!-- get data of user -->
                    <?php 
                        $sid=$_SESSION['uid'];
                        $req=mysqli_query($conn,"SELECT * from `user` where id='{$_SESSION['uid']}'");
                        while($rows=mysqli_fetch_array($req)) {
                    ?>
                    <div>
                        <img src="userimg/<?php echo $rows['imgname']?>" alt="">
                        <h3><?php echo $rows['fname']?> <?php echo $rows['lname']?></h3>
                    </div>
                    <a href="php/logout.php">
                        <svg viewBox="0 0 24 24"width="30" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.44" d="M20 12h-9.5m7.5 3l3-3-3-3m-5-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2h5a2 2 0 002-2v-1"></path> </g></svg>
                    </a>
                    <?php
                        }
                    ?>
                </aside>
                <!-- search user -->
                <form action="#" onsubmit="event.preventDefault()">
                    <input type="text" name="search" id="search" onkeyup="searchh()">
                    <button type="submit" onclick="searchh()">
                        <svg viewBox="0 0 24 24"width="24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </button>
                </form>
            </div>
            <span class="scrollbar allusers"> <!-- list of users --></span>
        </div>
        <header class="header">
            <i class="back" onclick="f2()">
            <img width="30" height="30" src="https://img.icons8.com/ios-filled/30/back.png" alt="back"/>
            </i>
            <img src="img/defaultimg.jpg" alt="">
            <div>
                <h3></h3>
                <p></p>
            </div>
        </header>
        <div class="chat_area scrollbar">
            <main class="main_chat"></main>
            <span class="message">
                <input type="text" id="msg">
                <button onclick="sendmessage()">
                    <img  width="42" height="42"  src="https://img.icons8.com/material-rounded/42/8784ce/sent.png" alt="sent"/>
                </button>
            </span>
            <form action="#" id="formm">
                <input type="hidden" name="sender_id" value="<?php echo $_SESSION['uid'];?>">
                <input type="hidden" name="receiver_id" id="rid">
            </form>
        </div>
    </div>

<?php 
    include 'footer.php'; 
?>