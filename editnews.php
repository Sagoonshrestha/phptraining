<?php
require_once('connect.php');
$id=$_GET['id'];
$sql="select * from newsmanager where id='$id'";
$result=$conn->query($sql);
	// print_r($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if(isset($_POST['submit'])){
	if(isset($_POST['newstitle']) && $_POST['newstitle'] !=''){
		$newtitle = $_POST['newstitle'];
		
	}
	if(isset($_POST['editor1'] )&& $_POST['editor1'] !=''){
		$newscontent = $_POST['editor1'];
		
	}
	if(isset($_POST['seotitle']) && $_POST['seotitle'] !=''){
		$seotitle = $_POST['seotitle'];
		
	}
	if(isset($_POST['metatitle']) && $_POST['metatitle'] !=''){
		$metatitle = $_POST['metatitle'];
		
	}
	if(isset($_POST['metakeyword']) && $_POST['metakeyword'] !=''){
		$metakeyword = $_POST['metakeyword'];
		
	}
	if(isset($_POST['date']) && $_POST['date'] !=''){
		$date = $_POST['date']; 
		
	}
	if (isset($_POST['active']) && $_POST['active'] !='') {
		$active = $_POST['active'];
		
	}
	if(isset($_FILES['file'])){
		$file_name = $_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$file_name);
		$location = "uploads/".$file_name; 
	}
	
	if(isset($_POST['newstitle']) && isset($_POST['editor1']) && isset($_POST['seotitle']) && isset($_POST['metatitle']) && isset($_POST['metakeyword']) && isset($_POST['date']) && isset($_POST['active']) && isset($_FILES['file'])){
		// echo 'hello';
		$sql2 = "update newsmanager set news_title = '$newtitle', news_content = '$newscontent', seo_title = '$seotitle', meta_title = '$metatitle', meta_keyword = '$metakeyword',newsdate = '$date', active='$active', newsimage ='$location' where id = '$id'";
		// echo 'hello';
		$store = $conn->query($sql2);
		header("location:listnews.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>newsmanager</title>
	<h1> edit News Manager</h1>
	<script src="./ckeditor/ckeditor.js"></script>
</head>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<label> News Title:</label>
		<input type="text" name="newstitle" value="<?php echo $row['news_title']?>" >
		<br><br>
		<label>News content</label>
		<textarea name="editor1" id="editor1" rows="10" cols="50">
	        This is my textarea to be replaced with CKEditor 4.
	    </textarea>
	    <script>
	                // Replace the <textarea id="editor1"> with a CKEditor 4
	                // instance, using default configuration.
	        CKEDITOR.replace( 'editor1' );
	    </script>
		<br><br>
		<label>Seo Title:</label>
		<input type="text" name="seotitle" value="<?php echo $row['seo_title']?>">
		<br><br>
		<label>Meta Title:</label>
		<input type="text" name="metatitle" value="<?php echo $row['meta_title']?>">
		<br><br>
		<label>Meta Keyword:</label>
		<input type="text" name="metakeyword" value="<?php echo $row['meta_keyword']?>">
		<br><br>
		<label>Date:</label>
		<input type="date" name="date" value="<?php echo $row['newsdate']?>">
		<br><br>
		<label>Active:</label>
		<input type="radio" name="active" value="yes" checked="checked" >Yes
		<input type="radio" name="active" value="no">No
		<br><br>
		<input type="file" name="file" >
		<br><br>
		<input type="submit" name="submit">

	</form>


</body>
</html>