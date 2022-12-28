<?php
require_once('connect.php');
if(isset($_POST['submit'])){
	// $a =5;
	// Var_dump($a);
	//echo('hello');
	if($conn->connect_errno==0){
		$sql="select * from assigntable where email='".$_POST['email']."' ";
		$result=$conn->query($sql);
		var_dump($result);
		$count = mysqli_num_rows($result);

		// var_dump($result);
		
		// $detail=[]; 
		// while($row=$result->fetch_assoc()){
		// 	$detail[]=$row;
		// 	// print_r($detail);
		// }
	}
	// echo '<pre>';
	// print_r($detail);
	// echo'</pre>';

	// var_dump($result);
	// $sabin ='$2y$11$s4ZWZxI8QTkXG1Tf9MqEVO1WycJB3mu//kPrjQgqtZ.vePgzmSr4m';
	// 

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo '<pre>';
	print_r($row);
	echo'</pre>';

    print "hashedPass = ${row['password']}";
    echo "<br>";
    // print "myPassword: " . $myPassword;
    if(password_verify($_POST['password'], $row['password'])){
        print "Password match";
    } else{
        print "The username or password do not match";
    }
	} 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>hash login</title>
	<h1>hash login</h1>
</head>
<body>
	<form action='' method='post'>
		<label>email</label>
		<input type="text" name="email">
		<br><br>
		<label>password</label>
		<input type="password" name="password">
		<br><br>
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>