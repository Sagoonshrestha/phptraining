<?php
	require_once('connect.php');
	$id=$_GET['id'];
	// if($conn->connect_errno==0){
	// 	// $sql="select * from assignpmanager where id = '$id'";
	// 	// $result=$conn->query($sql);
	// 	// print_r($result);

	// 	// $detail=[]; 
	// 	// while($row=$result->fetch_assoc()){
	// 	// 	$detail[]=$row;
	// 	// 	// print_r($detail);
	// 	// }
	// 	$sql1 ="select page_image from assignpmanager where id=$id";
	// 		$result1=$conn->query($sql1);
	// 		$detail1=[];
	// 		While($row1=$result1->fetch_assoc()){
	// 			$detail1[]=$row1;
	// 			print_r($detail1);
	// 		}
	// }
	$sql1 ="select page_image from assignpmanager where id='$id'";
			$result1=$conn->query($sql1);
			
			$detail1=[];
			While($row1=$result1->fetch_assoc()){
				$detail1[]=$row1;
				// echo"detail1";
			 // print_r($detail1[0]);
			}
	if(isset($_POST['addimagebtn'])){
		// print_r($_FILES['addimage']['name']);
		
		if(isset($_FILES['addimage'])){
			$array1= array();
			foreach ($_FILES['addimage']['name'] as $key => $name){
	 
				$newFilename = time() . "_" . $name;
				// print_r($_FILES['addimage']['tmp_name'][$key]);
				// echo($newFilename);
				move_uploaded_file($_FILES['addimage']['tmp_name'][$key], 'uploads/' . $newFilename);
				// $location .= 'uploads/' . $newFilename . ',';
				
				array_push($array1,'uploads/' . $newFilename);
				// print_r($array1);
			}
		$array2 =array_merge($detail1[0],$array1);
		// echo"<pre> array2";
		//   print_r($array2);
		//   echo"</pre>";
		  
		$location = implode(',',$array2);
		
		$sql1 ="update assignpmanager set page_image='$location' where id ='$id'";
		$conn->query($sql1);
		header('location:imagemanager.php');
	}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>imager manager</title>
	<h1>Add image</h1>

</head>
<body>
	<div>
		<?php foreach($detail1 as $d) { ?>
			
			
			<?php $imgarray = explode(',',$d['page_image']);
			// print_r($imgarray);
			foreach ($imgarray as $key) {?>
			 	<img src="./<?php echo ($key);?>" width="150px;" height="150px;">
			<?php } ?>
			<br><br>
			
		<?php } ?>
		<br><br>
		
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="addimage[]" multiple>

			<input type="submit" name="addimagebtn" value="addimage">
		</form>
	</div>

</body>
</html>