<?php
	$server_username="quan";
	$server_password="";
	$server_host="localhost";
	$database="cskh_spa";
	$conn=mysqli_connect($server_host,$server_username,$server_password,$database) or die("Not connected");
	mysqli_query($conn,"SET NAMES 'UTF8'") or die (mysqli_connect_error());
?>  