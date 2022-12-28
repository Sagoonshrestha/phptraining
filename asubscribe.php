<?php
	require_once('connect.php');
	if($conn->connect_errno == 0){
		$sql="select * from subscribe";
		$store=$conn->query($sql);
		// print_r($store);
		$detail = array();
		while($row=$store->fetch_assoc()){
			$detail[] = $row;
		}
	}else{
		die("database connection error".$conn->connect_errno);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>news subscribe</title>
	<h1>newsletter subscribe</h1>
</head>
<body>
<div>
	<table border="1px">
		<tr>
			<th>id</th>
			<th>name</th>
			<th>email</th>
			<th>date_time</th>
			<th>activity</th>
		</tr>
		<?php foreach($detail as $d){?>
			<tr>
				<td><?php echo $d['id'];?></td>
				<td><?php echo $d['name'];?></td>
				<td><?php echo $d['email'];?></td>
				<td><?php echo $d['date_time'];?></td>
				<td><a href="deletesubscriber.php?id=<?php echo $d['id']?>" onclick="return confirm('are you sure u want to delete')">delete</a></td>
			</tr>
		<?php } ?>	
	</table>
</div>
<br><br>
<div>
	<input type="button" name="button" value="Export to excel" onclick=" window.location.href='excel.php'">
</div>
</body>
</html>