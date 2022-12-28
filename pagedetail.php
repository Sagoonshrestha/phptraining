<?php 
require_once('connect.php');
require_once('header.php');
$pt=$_GET['id'];
$sql="select * from assignpmanager where id='$pt'";
$result = $conn->query($sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// echo '<pre>';
// print_r($row);
// echo'</pre>'
?>
<!DOCTYPE html>
<html>
<head>
	<title>page detail</title>
	<h1>page detail</h1>
</head>
<body>
	<div>
		<label>id:</label>
		<?php echo $row['id']?>
		<br><br>
		<label>page title:</label>
		<?php echo $row['page_title']?>
		<br><br>
		<label>page description :</label>
		<?php echo $row['page_description']?>
		<br><br>
		<label>active :</label>
		<?php echo $row['active']?>
		<br><br>
		<label>parent page :</label>
		<?php echo $row['parent_page']?>
		<br><br>
		<label>image :</label>
		<br><br>
		<?php $imgarray = explode(',',$row['page_image']);
			// print_r($imgarray);
			foreach ($imgarray as $key) {?>
			 	<img src="./<?php echo ($key);?>" width="150px;" height="150px;">
		<?php } ?>


	</div>
	<?php require_once('footer.php')?>
</body>
</html>