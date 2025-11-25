<?php
    $name=$_POST['full_name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $college=$_POST['college_name'];

    if(!empty($name) || !empty($phone) || !empty($email) || !empty($pass) || !empty($college)){
        $server="localhost";
        $user="root";
        $pass="";
        $db="result";
        $conn=mysqli_connect($server,$user,$pass,$db);
        if(mysqli_connect_error()){
            die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{
            $select="select * from signup where collegename,fullname,email,phone=?,?,?,? limit 1";
            $insert="insert into signup (collegename,fullname,email,phone) values(?,?,?,?)";

            $stmt=$conn->prepare($select);
            $stmt->bind_param($college,$name,$email,$pass,$phone);
            $stmt->execute();
            $rnum=$stmt->num_rows;

            if($rnum==0){
                $stmt->close();

                $stmt=$conn->prepare($insert);
                $stmt->bind_param($college,$name,$email,$pass,$phone);
                $stmt->execute();
                echo "New Record inserted successfully.";
            }else{
                echo "Someone is already registered with this Email ID.";
            }
            $stmt->close();
            $conn->close();
        }
        mysqli_select_db($conn,"result");
    }
    else{
        echo "Enter all details.";
        die();
    }
?>