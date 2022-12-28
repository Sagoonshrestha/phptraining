<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['submit'])){
	if(isset($_POST['newstitle']) && $_POST['newstitle'] != ''){
		$newtitle = $_POST['newstitle'];
		
	}
	if(isset($_POST['editor1'])&& $_POST['editor1'] != ''){
		$newscontent = $_POST['editor1'];
		
	}
	if(isset($_POST['seotitle'])&& $_POST['seotitle'] != ''){
		$seotitle = $_POST['seotitle'];
		
	}
	if(isset($_POST['metatitle'])&& $_POST['metatitle'] != ''){
		$metatitle = $_POST['metatitle'];
		
	}
	if(isset($_POST['metakeyword'])&& $_POST['metakeyword'] != ''){
		$metakeyword = $_POST['metakeyword'];
		
	}
	if(isset($_POST['date'])&& $_POST['date'] != ''){
		$date = $_POST['date']; 
		
	}
	if (isset($_POST['active'])&& $_POST['active'] != '') {
		$active = $_POST['active'];
		
	}
	if(isset($_FILES['newsimage'])){
		$file_name = $_FILES['newsimage']['name'];
		move_uploaded_file($_FILES['newsimage']['tmp_name'], "uploads/".$file_name);

		// echo "<img src=\"uploads/$file_name\"/>";
		// die();
		
		// if (is_uploaded_file($file_name)){
		//     echo ("$file_name is uploaded via HTTP POST");
		// }else{
		//     echo ("$file_name is not uploaded via HTTP POST");
				
		// }
		$location ='uploads/' . $file_name;
	}
	if(isset($_POST['newstitle']) && isset($_POST['editor1']) && isset($_POST['seotitle']) && isset($_POST['metatitle']) && isset($_POST['metakeyword']) && isset($_POST['date']) && isset($_POST['active']) && isset($_FILES['newsimage'])){
		// echo "hello";
		$sql = "insert into newsmanager(news_title, news_content, seo_title, meta_title, meta_keyword, newsdate, active,newsimage) values('$newtitle','$newscontent','$seotitle','$metatitle','$metakeyword','$date','$active','$location') ";
		$result = $conn->query($sql);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>newsmanager</title>
	<h1>News Manager</h1>
	<script src="./ckeditor/ckeditor.js"></script>
</head>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<label> News Title:</label>
		<input type="text" name="newstitle" >
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
		<input type="text" name="seotitle">
		<br><br>
		<label>Meta Title:</label>
		<input type="text" name="metatitle">
		<br><br>
		<label>Meta Keyword:</label>
		<input type="text" name="metakeyword">
		<br><br>
		<label>Date:</label>
		<input type="date" name="date">
		<br><br>
		<label>Active:</label>
		<input type="radio" name="active" value="yes" checked="checked" >Yes
		<input type="radio" name="active" value="no">No
		<br><br>
		<label>image</label>
		<input type="file" name="newsimage">
		<br><br>
		<input type="submit" name="submit">

	</form>

</body>
</html>