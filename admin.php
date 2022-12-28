<?php
	include('header.php');
	if(isset($_POST['submit'])){
		if(isset($_POST['email'])){
			$email=$_POST['email'];
			// echo($email);
		}
		if(isset($_POST['oldpasssword'])){
			$opswd=$_POST['oldpasssword'];
		}
		if(isset($_POST['newpassword'])){
			$npswd=$_POST['newpassword'];
		}
		if(isset($_POST['confirmpassword'])){
			$cpswd=$_POST['confirmpassword'];
		}
		if((isset($_POST['newpassword']) && isset($_POST['confirmpassword'])) && $npswd==$cpswd ){
			if((isset($_POST["email"])&&$_POST['email']==$_SESSION['assignlogin']['email']) &&  (isset($_POST['oldpasssword'])&&$_POST['oldpasssword']==$_SESSION['assignlogin']['password'])){
			require_once('connect.php');
			$sql= "update assigntable set password='$npswd' where email='$email'";
			$conn->query($sql);
			$_SESSION['assignlogin']['password']=$npswd;
			// print_r($_SESSION['assignlogin']);
			} else{
				echo('password and email didnot match');
			}
		} else{
			echo('new password didnot match');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		admin panel
	</title>
	<h1>admin</h1>
</head>
<body>

<?php 
	// print_r($_SESSION['assignlogin']);
	if(isset($_SESSION['assignlogin'])){
?>
	<div style="margin-left: 10px">
		<form action="" method="post">
				<label>email</label>
				<br>
				<input type="text" name="email">
				<br>
				<label>Old password</label>
				<br>
				<input type="password" name="oldpasssword">
				<br>
				<label>New password</label>
				<br>
				<input type="password" name="newpassword">
				<br>
				<label>Confirm Password</label>
				<br>
				<input type="password" name="confirmpassword">
				<br><br>
				<input type="submit" name="submit" value="submit">
		</form>
	</div>

<?php } else{
	header('location:login.php');
}?>
<?php require_once('footer.php');?>
</body>
</html>
