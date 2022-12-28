<?php
	require_once('header.php');
	require_once('connect.php');
	if($conn->connect_errno==0){
		$sql="select * from assignpmanager";
		$result=$conn->query($sql);
		// var_dump($result);

		$detail=[]; 
		while($row=$result->fetch_assoc()){
			$detail[]=$row;
			// print_r($detail);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>imager manager</title>
	<h1>imager manager</h1>

</head>
<body>
	<div style="margin-left: 10px">
		<?php foreach($detail as $d) { ?>
			<label>id:</label>
			<?php echo $d['id'];?>
			<br><br>
			<label>page title:</label>
			<?php echo $d['page_title'];?>
			<br><br>
			<label>page description:</label>
			<?php echo $d['page_description'];?>
			<br><br>
			<?php $imgarray = explode(',',$d['page_image']);
			// print_r($imgarray);
			foreach ($imgarray as $key) {?>
			 	<img src="./<?php echo ($key);?>" width="150px;" height="150px;">
			<?php } ?>
			<br><br>
			<a href="iadd.php?id=<?php echo $d['id'];?>">add</a><br><a href="idelete.php?id=<?php echo $d['id'];?>">Delete</a>
			<br><br>
		<?php } ?>

	</div>
	<?php require_once('footer.php');?>

</body>
</html>