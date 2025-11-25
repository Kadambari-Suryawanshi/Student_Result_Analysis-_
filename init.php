<?php
	$servername = "localhost:3306";
	$username = "root";
	$password = "kuki";
	$conn = mysqli_connect($servername, $username, $password,'resultanalysis');
	if($conn==true){
		echo '<script language="javascript">';
		echo "alert('Login Successfully!')";
		echo '</script>';
	}else{
		die(mysqli_connect_error());
	}
	#$db = mysqli_select_db($conn,);
?>