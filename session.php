<?php
   include('init.php');
   session_start();
   $db = mysqli_select_db($conn,'resultanalysis');
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select email from admin where email= '$user_check'");
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['login_user'])){
      header("Location:adminlogin.php");
   }
?>