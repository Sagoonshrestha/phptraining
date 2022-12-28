<?php
require_once('connect.php');
if($conn->connect_errno == 0){
	$sql = "select * from downloads";
	$store = $conn->query($sql);
	$detail=[];
	while($row=$store->fetch_assoc()){
		$detail[]=$row;
	}
}else{
	die("database connection error".$conn->connect_errno);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>List of Download</title>
	<h1>List of Downloads</h1>
</head>
<body>
	<div>
		<table border="1px">
			<tr>
				<th>id</th>
				<th>Document Name</th>
				<th>Active</th>
				<th>Document Path</th>
				<th>Activity</th>
			</tr>
			<?php foreach($detail as $d) { ?>
				<tr>
					<td><?php echo $d['id']?></td>
					<td><?php echo $d['document_name']?></td>
					<td><?php echo $d['active']?></td>
					<td><?php echo $d['document_path']?></td>
					<td>
						<a href="editdownload?id=<?php echo $d['id']?>">edit</a>
						<a href="deletedownload?id=<?php echo $d['id']?>">delete</a>
					</td>
				</tr>
			<?php }?>	
		</table>
		<br><br>
		<a href="download.php">add files</a>
	</div>
</body>
</html>