<?php
require_once('connect.php');
require_once('header.php');

$sql1 = "select * from assignpmanager";
$store = $conn->query($sql1);
$detail =[];
while($row=$store->fetch_assoc())
	{
		$detail[]=$row;
	}

if(isset($_POST['submit']))
{
	if(isset($_POST['ptitle']) && $_POST['ptitle'] !='' )
	{
		$ptitle=$_POST['ptitle'];

	}
	else{
		$errptitle="enter the page title";
	}
	if(isset($_POST['edtior1'])&& $_POST['edtior1'] !='' )
		echo('editor');
	{
		$pdes = trim($_POST['editor1']);
		
	}
	// if(isset($_FILES['pimage']))
	// {
	// 	$pimage=$_FILES['pimage']['name'];
		
	// }
	if(isset($_FILES['pimage']))
	{
		$location_arr= array();
	foreach ($_FILES['pimage']['name'] as $key => $name){
 
		$newFilename = time() . "_" . $name;
		move_uploaded_file($_FILES['pimage']['tmp_name'][$key], 'uploads/' . $newFilename);
		// $location .= 'uploads/' . $newFilename . ',';
		array_push($location_arr,'uploads/' . $newFilename);
 		// print_r($location_arr);
		
	}
	// echo($location);
	// mysqli_query($conn,"insert into photo (location) values ('$location')");
	}
	if(isset($_POST['active'])&& $_POST['active'] !='')
	{
		$act=$_POST['active'];
	}
	if(isset($_POST['dropdown'])&& $_POST['dropdown'] !='')
	{
		$dropd=$_POST['dropdown'];
		// echo($dropd);
	}
	if(isset($_POST['priority']) && $_POST['priority'] !=''){
		$priority=$_POST['priority'];
	}

	
	if(isset($_POST['ptitle']) && isset($_POST['editor1']) && isset($_POST['active'])&& isset($_POST['active'])&&isset($_POST['dropdown'])&&isset($_FILES['pimage'])){
			// echo ('here'.$dropd);
		$location =implode(",",$location_arr);
			$sql = "insert into assignpmanager(page_title,page_description,page_image,active,parent_page,priority) values('$ptitle','$pdes','$location','$act','$dropd','$priority')";
			$result=$conn->query($sql);
			// print_r($result);
		
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>page manager</title>
	<h1>Add New Page</h1>
	 <script src="./ckeditor/ckeditor.js"></script>
	 <script type="text/javascript" src="./ckfinder/ckfinder.js"></script>
</head>
<body>
	<div style="margin-left: 10px">
		<form action="" method = "post" enctype="multipart/form-data">
			<label>page title</label>
			<input type="text" name="ptitle">
			<?php if(isset($errptitle)){echo($errptitle);}?>
			<br><br>
			<label>page description</label>
			<textarea name="editor1" id="editor1" rows="10" cols="50">
	                This is my textarea to be replaced with CKEditor 4.
	            </textarea>
	            <script>
	                // Replace the <textarea id="editor1"> with a CKEditor 4
	                // instance, using default configuration.
	                var editor = CKEDITOR.replace( 'ckfinder' );
					CKFinder.setupCKEditor( editor );
	                CKEDITOR.replace( 'editor1' , {
					  height: 300,
					  filebrowserUploadUrl: "upload.php",
					  filebrowserUploadMethod: 'form'
					 });
	            </script>
			<br><br>
			<label>Parent page</label>
			<select name="dropdown">
				<option value="-1">default</option>
				<?php foreach($detail as $d) { if($d['parent_page']== -1){ ?>
				<option value="<?php echo($d['id']); ?>">
					<?php echo $d['id']?>
				</option>
				<?php }  } ?>
			</select>
			<br><br>
			<label>page image</label>
			<input type="file" name="pimage[]" multiple>
			<br><br>
			<label>Active:</label>
			<input type="radio" name="active" value="yes" checked="checked" >Yes
			<input type="radio" name="active" value="no">No
			<br><br>
			<label>Priority</label>
			<select name="priority">
			<?php $order=array(1,2,3,4,5,6,7,8,9);
				foreach($order as $o) { ?>
					<option value="<?php echo $o?>"><?php echo $o?></option>
				<?php } ?>
			</select>
			<br><br>
			<input type="submit" name="submit">
			
			
		</form>
	</div>
	<?php require_once('footer.php');?> 

</body>
</html>