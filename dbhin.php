<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "wearhouse";

	$conn = mysqli_connect($servername,$username,$password,$dbName);

	if(!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}

 ?>