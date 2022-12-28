  
<?php
require_once('connect.php');
$pt=$_GET['id'];
echo($pt);


$sql="delete from assignpmanager where id='$pt'";
$result=$conn->query($sql);
print_r($result);

header("Location:pagemanager.php");

?>