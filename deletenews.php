<?php
require_once('connect.php');
$pt=$_GET['id'];
// echo($pt);


$sql="delete from newsmanager where id='$pt'";
$result=$conn->query($sql);
print_r($result);

header("Location:listnews.php");

?>