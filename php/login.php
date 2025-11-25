<?php
    include "connection.php";
    mysqli_select_db($conn,"result");

    if(isset($_POST['email'])){
        $email=$_POST['email'];
        $pw=$_POST['password'];
        $sql="select * from login where email='".$email."' AND password='".$pw."' limit 1";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)==2){
            echo "Login Successfully!";
            exit();
        }
        else{
            echo "Wrong Username & Password...!!";
            exit();
        }
    }
?>