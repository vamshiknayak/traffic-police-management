<?php

	$host='127.0.0.1';
	$username='root';
	$password='';
	$database='dbtrafficpolice';

	$conn=mysqli_connect($host,$username,$password,$database);

	if (!$conn) {
		die("Cannot connect to the database: " . mysqli_connect_error());
	}

?>