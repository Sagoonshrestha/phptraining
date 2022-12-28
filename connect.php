<?php
	$servernmame = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'testdb';

	$conn = new mysqli($servernmame,$username, $password, $database);
	// print_r($conn);
	if($conn->connect_errno != 0){
	die("database connection error:".$conn->connect_error);
}
?>