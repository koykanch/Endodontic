<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$select_db = "dentalsystem";
	
	$conn = new mysqli($servername,$username,$password,$select_db);
	mysqli_set_charset($conn,"utf8");

	if(mysqli_connect_errno($conn))
	{

		echo "Failed to connect to database!!!!" . mysqli_connect_error($conn);

	}
/*
	else{
		echo "Connect to database success....";
	}
*/
	return $conn;

?>