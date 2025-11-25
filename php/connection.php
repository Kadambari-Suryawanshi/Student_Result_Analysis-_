<?php
    $server="localhost";
    $user="root";
    $pass="";
    $conn=mysqli_connect($server,$user,$pass);
    if(!$conn){
        die("Sorry! We failed to connect ".mysqli_connect_error());
    }
    else{
        echo "<b>Connected Successfully!</b>";
    }
?>