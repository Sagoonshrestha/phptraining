<?php
require_once('connect.php');
if($conn->connect_errno == 0){
	 $sql = "select * from newsmanager ";
	 $store = $conn->query($sql); 
	 //  $count=mysqli_num_rows($store);
	 // echo($count);
	 $detail = [];
	 while($row=$store->fetch_assoc()){
	 	$detail[] = $row; 
	 }
	

}
// echo '<pre>';
// print_r($detail);
// echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.flex-container {
    		display: flex;
    		overflow-x: auto;
		}

		.flex-child {
		    flex: 1;
		    border: 2px solid yellow;
		    margin-right: 20px;

		   
		/*.flex-child:first-child {
    		
		} */
	</style>
</head>
<body>
	<div class="flex-container">
		<?php foreach($detail as $d){ //echo $d['newsimage']; ?>

		<div class= "flex-child">
			<img src="./<?php echo $d['newsimage'];?>" width="200px" height="200px" >
			<label>news title:</label>
			<?php echo $d['news_title']?>
			<br><br>
			<label>news content:</label>
			<?php echo $d['news_content']?>
			<br><br>
			<a href="editnews.php?id=<?php echo $d['id']?>">edit</a>
			<br><br>
			<a href="deletenews.php?id=<?php echo $d['id']?>">delete</a>
		</div>
		<?php } ?>
	</div>
	<br><br>
	<div>
		<input type="button" name="button" value="Export to excel" onclick=" window.location.href='excel.php'">
	</div>
</body>
</html>