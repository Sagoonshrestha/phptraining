<?php 
require_once('connect.php');
$sql = "select * from multipleimage";
$store = $conn->query($sql);
$detail =array();
while($row=$store->fetch_assoc())
{
	$detail[]=$row;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border='1px'>
		<tr>
			<th>image_id</th>
			<th>image_location</th>
			<th>page_id</th>
			<th>activity</th>
		</tr>
		<?php foreach($detail as $d) {?>
		<tr>
			
				<td><?php echo ($d['image_id']);?></td>
				<td><?php echo $d['image_location'];?></td>
				<td><?php echo $d['page_id']?></td>
				<td><a href="idelete.php?id=<?php echo $d['image_id'];?>" onclick="return confirm('are you sure u want to delete')">delete</a>

				</td>
			
		</tr>
		<?php } ?>
	</table>
</body>
</html>