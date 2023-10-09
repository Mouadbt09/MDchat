<?php
    $conn = mysqli_connect('localhost','root','','chat');
    if(!$conn){
        echo 'ERROR while connecting to database';
    }
?>