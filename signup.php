

<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
	<h1>signup</h1>
</head>
<body>
	<form action='' method ='POST'>
		<div>

		<label>email</label>
		<br>
		<input type="text" name="email">
		<br>
		<label>password</label>
		<br>
		<input type="password" name="password">
		<br>
		<input type="submit" name="submit" value="submit">
	</div>
		
	</form>

</body>
</html>
<?php
	if(isset($_POST['submit']))
	{

		if(isset($_POST['email']) && $_POST['email'] != '')
		{
			$email = $_POST['email'];
		} 
		if(isset($_POST['password']) && $_POST['password'] !='')
		{
			$options = [
    			'cost' => 11  
			];
			$pswd = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
			echo($pswd);
		} 
		if(isset($_POST['email']) && isset($_POST['password'])){

			require_once('connect.php');
			$sql = "insert into assigntable(email,password) values(?,?)";
			// $conn->query($sql);
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('ss', $email,$pswd);
			$stmt->execute();
			$stmt->close();
			$conn->close();	
		} 

	}
