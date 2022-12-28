<?php
	$conn = new mysqli("localhost","root","","lol");
 
	// foreach ($_FILES['upload']['name'] as $key => $name){
 
	// 	$newFilename = time() . "_" . $name;
	// 	move_uploaded_file($_FILES['upload']['tmp_name'][$key], 'uploads/' . $newFilename);
	// 	$location .='uploads/' . $newFilename . ',';
 
		
	// }
	// echo($location);
	if(isset($_FILES['pimage'])){
      $errors= array();
      $file_name = $_FILES['pimage']['name'];
      print_r($_FILES['image']);
      $file_size =$_FILES['pimage']['size'];
      $file_tmp =$_FILES['pimage']['tmp_name'];
      $file_type=$_FILES['pimage']['type'];
      $ar=explode('.',$_FILES['pimage']['name']);
      $file_ext=strtolower(end($ar));
      print_r($file_ext);
      
      $extensions= array("jpeg","jpg","png");
      foreach($file_name as $key =>$name){
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($_FILES['pimage']['tmp_name'][$key],"./uploads/".$file_name);
         $location .='uploads/' . $file_name . ',';
         echo($locaton);
         echo "Success";
      }else{
         print_r($errors);
      }
      }
  }
	mysqli_query($conn,"insert into photo (location) values ('$location')");
	// header('location:index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="height:50px;"></div>
	<div style="margin:auto; padding:auto; width:80%;">
		<span style="font-size:25px; color:blue"><center><strong>Uploading Multiple Files into MySQL Database using PHP/MySQLi</strong></center></span>
		<hr>		
		<div style="height:20px;"></div>
		<form method="POST" action="" enctype="multipart/form-data">
		<input type="file" name="upload[]" multiple>
		<input type="submit" value="Upload"> 
		</form>
	</div>
	<div style="margin:auto; padding:auto; width:80%;">
		<h2>Output:</h2>
		<?php
		$conn = new mysqli("localhost","root","","lol");
			$query=mysqli_query($conn,"select * from photo");
			while($row=mysqli_fetch_array($query)){
				?>
				<img src="<?php echo $row['location']; ?>" height="150px;" width="150px;">
				<?php
			}
 
		?>
	</div>
</body>
</html>