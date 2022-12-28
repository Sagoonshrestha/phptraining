<!DOCTYPE html>
<html>
<head>
	<title>ck editor</title>
	<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="./ckfinder/ckfinder.js"></script>

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<label>Mesage</label>
	<textarea name="editor" id="editor">
		
	</textarea>
	<br><br>
	<input type="submit" name="submit" value="submit">
</form>

<script>
	var editor = CKEDITOR.replace( 'ckfinder' );
	CKFinder.setupCKEditor( editor );
	 CKEDITOR.replace( 'editor', {
	  height: 300,

	  filebrowserUploadUrl: "upload.php",
	  filebrowserUploadMethod: 'form'
	 });

</script>
</body>
