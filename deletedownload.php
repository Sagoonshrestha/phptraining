<?php
require_once('connect.php');
$id = $_GET['id'];
if($conn->connect_errno == 0){
	$sql = "delete from downloads where id='$id'";
	$conn->query($sql);
	header('location:listdownload.php');
}else{
	die('database connection error'.$conn->connect_errno);
}
?>