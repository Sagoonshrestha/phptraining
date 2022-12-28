<?php
require_once('connect.php');
$id=$_GET['id'];
	if(isset($_POST['submit'])){
		$filename=$_FILES["filetoupload"]["name"];
		$tmpname=$_FILES["filetoupload"]["tmp_name"];
		$filetype=$_FILES["filetoupload"]["type"];
		$errors=[];
		$fileextensions=["pdf","jpg","xlsx","docx","csv","json"];
		$arr=explode(".",$filename);
		// print_r($arr);
		$ext=strtolower(end($arr));
		// echo $ext;

		$uploadpath="./downloads/".$filename;
		if(! in_array($ext,$fileextensions))
		{
		  $errors[]="Invalid filename";
		}
		if(empty($errors))
		{
		    if(move_uploaded_file($tmpname,$uploadpath))
		    {
		      echo "file uploaded successfully";
		    }
		    else
		    {
		      echo "not successfull";
		    }
		}
		else
		{
		  foreach($errors as $value)
		  {
		    echo "$value";
		   }
		}
		if(isset($_POST['name']) && $_POST['name']){
			$name = $_POST['name'];
		}
		if(isset($_POST['active'])){
			$active = $_POST['active'];
		}
		if(isset($_POST['name']) && isset($_POST['active']) && isset($_FILES['filetoupload'])){
			// echo 'hello';
			$sql = "update downloads set document_name='$name',active='$active',document_path='$uploadpath' where id='$id'";
			$store = $conn->query($sql);
			header('location:listdownload.php'); 
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Download</title>
	<h1>Edit Download</h1>
</head>
<body>
	<div>
		<form action='' method='post' enctype="multipart/form-data">
		<label>Document Name</label>
		<input type="text" name="name">
		<br><br>
		<label>Active</label>
		<input type="radio" name="active" value="Yes" checked="checked">yes
		<input type="radio" name="active" value="No">no
		<br><br>
		<label>File</label>
		<input type="file" name="filetoupload">
		<br><br>
		<input type="submit" name="submit" value="upload">
	</form>
	</div>
</body>
</html>