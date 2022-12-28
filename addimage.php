<?php 
require_once('connect.php');
require_once('header.php');
$id=$_GET['id']; 
$sql = "select * from multipleimage where page_id = '$id'";
$store = $conn->query($sql);
$detail =array();
while($row=$store->fetch_assoc())
{
	$detail[]=$row;
}

// $sql1 = "select * from multipleimage";
// $store = $conn->query($sql1);
// $detail =[];
// while($row=$store->fetch_assoc())
// 	{
// 		$detail[]=$row;
// 	}
	   if(isset($_POST['submit'])){
	   		
	   		if(isset($_FILES['file'])){
	   			$file_name=$_FILES['file']['name'];
	   			// print_r($_FILES['file']['name']);
	   			move_uploaded_file($_FILES['file']['name'], "./uploads/".$file_name);
	   			$location ='uploads/' . $file_name ;
	   		}
	   		if(!empty($_FILES['file'])){
	   			// echo("hello");
	   			$sql="insert into multipleimage(image_location, page_id) values('$location','$id')";
	   			$result = $conn->query($sql);
	   		}
	   		header('location:addimage.php?id='.$id);
	   }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action ="" method = "POST" enctype="multipart/form-data">
		<br><br>
		<label>image location:</label>
		<input type="file" name="file">
		<br><br>
		<input type="submit" name="submit" value="submit">
	</form>
	<br><br>
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
<?php require_once("footer.php")?>
</body>
</html>
