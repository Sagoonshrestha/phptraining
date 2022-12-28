<?php 
 require_once('connect.php');
 $pt=$_GET['id'];
 // echo($pt);
 $sql2="delete from multipleimage where image_id='$pt'";
$result=$conn->query($sql2);
// print_r($result);

header("location:singleimg.php");
?>
