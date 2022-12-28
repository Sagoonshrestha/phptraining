<?php
	if(isset($_POST['submit']))
	{

		if(isset($_POST['email']))
		{
			$email = $_POST['email'];
		} 
		if(isset($_POST['password']))
		{
			$pswd = $_POST['password'];
		} 
		if (isset($_POST['email']) && isset($_POST['password']))
		{
			require_once('connect.php');
	
 		$result = mysqli_query($conn,"SELECT * FROM assigntable WHERE email='" . $_POST["email"] . "' and password='".$_POST["password"]."'" );
 		// print_r($result)
 		$count  = mysqli_fetch_row($result);
 		// print_r($count);
 		if(isset($_POST['remember'])){
 			setcookie('email', $email,time()+ (60*60));
 			setcookie('password', $pswd, time()+(60*60));
 		}
 		
 			// echo ($_COOKIE['password']);
			if($count==0) {
				echo("not valid");	
				} else {

				session_start();
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				  if(password_verify($_POST['password'], $row['password'])){
        				print "Password match";
   					 } else{
        				print "The username or password do not match";
					} 
				$_SESSION['assignlogin']=array('email'=>$email,'password'=>$pswd);
				print_r($_SESSION);
				// die();
				header('Location:dashboard.php');
			}
		}
				
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<h1 style ="margin-left: 10px; margin-left:105px">login</h1>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
	<script type="text/javascript">

		jQuery(document).ready(function($) { 
	 
		    $('#btn-submit').click(function(e) {  
		 		// e.preventDefault();
		        $(".error").hide();
		        var hasError = false;
		        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 
		        var emailaddressVal = $("#UserEmail").val();
		        if(emailaddressVal === '') {
		            $("#UserEmail").after('<br><span class="error" style="color:red;">Please enter your email address.</span>');
		            hasError = true;
		        }
		 
		        else if(!emailReg.test(emailaddressVal)) {
		            $("#UserEmail").after('<br><span class="error" style="color:red;">Enter a valid email address.</span>');
		            hasError = true;
		        }
		 
		        
		        if($('#password').val()===''){
		        	$('.perror').html('<br>empty password');
		        	hasError = true;
		        	$(".perror").show();
		        }
		        if(hasError == true) { return false; }
		 
		   	});
		});

</script>
<style type="text/css"> 
#loginform{ margin-top: 20px;
	width:230px;
	height:255;
    margin-left: 0;
    padding-top: 26px;
    padding-right: 24px;
    padding-bottom: 34px;
    padding-left: 24px;
    font-weight: 400;
    overflow-x: hidden;
    overflow-y: hidden;
    background-image: initial;
    background-position-x: initial;
    background-position-y: initial;
    background-size: initial;
    background-repeat-x: initial;
    background-repeat-y: initial;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
    background-color: rgb(255, 255, 255);
    border-top-color: rgb(195, 196, 199);
    border-top-style: solid;
    border-top-width: 1px;
    border-right-color: rgb(195, 196, 199);
    border-right-style: solid;
    border-right-width: 1px;
    border-bottom-color: rgb(195, 196, 199);
    border-bottom-style: solid;
    border-bottom-width: 1px;
    border-left-color: rgb(195, 196, 199);
    border-left-style: solid;
    border-left-width: 1px;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
    box-shadow: 0 1px 3px rgb(0 0 0 / 4%);}
  
</style>
</head>
<body>
	<?php
	session_start();
	if(!isset($_SESSION['assignlogin'])){ ?>
		<form action='' method ='POST' id='loginform'>
		<div style="margin-left:10px ">

		<label style>Email</label>
		<br>
		<input type="text" name="email" value="<?php echo isset($_COOKIE['email'])?$_COOKIE['email']:''?>" id="UserEmail">
		<br>
		<label>Password</label>
		<br>
		<input type="password" name="password" value="<?php echo isset($_COOKIE['password'])?$_COOKIE['password']:''?>" id="password">
		
		<span class="perror"></span>
		<br><br>
		<input type="submit" name="submit" value="login" id="btn-submit">
		<br><br>

		 <label>
      		<input type="checkbox" checked="checked" name="remember"> Remember me
    	</label>

		</div>
			
	</form>
	<?php } else{ ?> 
		<h1>not allowed</h1>
		<a href="logout.php"> logout	</a>
	<?php }?>

	<?php require_once('footer.php');?>

</body>
</html>