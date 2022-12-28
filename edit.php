<?php 
require_once('header.php');
 require_once('connect.php');
	$id=$_GET['id'];
	$sql="select * from assignpmanager where id='$id'";
	$result=$conn->query($sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if(isset($_POST['submit']))
	{
		if(isset($_POST['ptitle']) && $_POST['ptitle'] !='')
		{
			$ptitle=$_POST['ptitle'];
		}
		if(isset($_POST['editor1'])&& $_POST['editor1'] !=''){
			$pdes =$_POST['editor1'];
		}
		if(isset($_POST['pimage']) && $_POST['pimage'] !=''){
			$pimg= $_POST['pimage'];
		}
		if(isset($_POST['active']) && $_POST['active'] !=''){
			$act=$_POST['active'];
		}
		if(isset($_POST['priority']) && $_POST['priority'] !=''){
			$priority=$_POST['priority'];
		}
		if(isset($_POST['ptitle']) && isset($_POST['editor1']) && isset($_POST['pimage']) && isset($_POST['active'])){
			$sqll="update assignpmanager set page_title='$ptitle',page_description ='$pdes', page_image='$pimg', active='$act' where id='$id'";
			$conn->query($sqll);
			header("location:pagemanager.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
	<h1>Edit</h1>
	<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="./ckfinder/ckfinder.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$("#btn-submit").click(function(e){
				$(".error").hide();
				var haserror = false;
				 if($("#ptitle").val()==''){
				 	$("#ptitle").after('<span class="error">enter the page title</span>');
				 	e.preventDefault();
				 }
				 if($("#pdescription").val()==''){
				 	$("#pdescription").after('<span class="error">enter the page description</span>');
				 	e.preventDefault();
				 }
				 if(haserror == true) {return false;}
				});
		});
	</script>
</head>
<body>
	<div style="margin-left:10px">
		<form action ="" method ="post">
			<label>page title</label>
			<input type="text" name="ptitle" id="ptitle" value="<?php echo "${row['page_title']}";?>">
			<br><br>
			<label>page description</label>
			<textarea name="editor1" id="editor1" rows="10" cols="50" >
	                <?php echo "${row['page_description']}"; ?>
	        </textarea>
	            <script>
	                // Replace the <textarea id="editor1"> with a CKEditor 4
	                // instance, using default configuration.
	                var editor = CKEDITOR.replace( 'ckfinder' );
					CKFinder.setupCKEditor( editor );
	                CKEDITOR.replace( 'editor1', {
					  height: 300,
					  filebrowserUploadUrl: "upload.php",
					  filebrowserUploadMethod: 'form'
					 } );
	            </script>
			<br><br>
			<label>page image</label>
			<input type="file" name="pimage" id="pimage">
			<br><br>
			<label>Active</label>
			<input type="radio" name="active" value="yes" checked="checked">Yes
			<input type="radio" name="active" value="no">No
			<br><br>
			<label>Priority</label>
			<select name="priority" >
			<?php $order=array(1,2,3,4,5,6,7,8,9);
				foreach($order as $o) { ?>
					<option value="<?php echo $o?>"><?php echo $o?></option>
				<?php } ?>
			</select>
			<br><br>
			<input type="submit" name="submit" id="btn-submit">
		</form>
	</div>
	<?php require_once('footer.php');?>
</body>
</html>