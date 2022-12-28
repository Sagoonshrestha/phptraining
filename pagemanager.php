<?php
	require_once("header.php");
	// print_r($_SESSION['assignlogin']);
	require_once('connect.php');
	//print_r($conn);
	if($conn->connect_errno==0)
	{
    $sql="select * from assignpmanager";

    $result=$conn->query($sql);

    $detail=[];
    while($row=$result->fetch_assoc())
    {
      $detail[]=$row;
    }
  
  //print_r($detail);
   

	}else{
		die('database connectionerror'.$conn->connect_errno);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>list </title>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<h1 style="text-align: center">page manager</h1>
</head>
<body>
	<?php 
	// print_r($_SESSION['assignlogin']);
		if(isset($_SESSION['assignlogin'])){
	?>
	<br><br>
	<div style="margin-left: 10px">
		<div style="display: block; text-align: center;  ">
		<a href="addnewpage.php"  style="text-align:center; color: red; ">Add Page Detail</a>
	</div>
		<br><br>
		<div style="text-align: center;">
			<table border="2px" id="pagemanager">
				<tr>
					<th>Id</th>
					<th>PageTitle</th>
					<th>PageDescription</th>
					<th colspan="3" style="text-align: center"> Activity</th>
				</tr>
				<?php foreach($detail as $d) { ?>
				<tr>
					<td style="padding: 5px"><?php echo $d['id']?></td>
					<td style="padding: 5px"><?php echo $d['page_title']?></td>
					<td style="padding: 5px"><?php echo $d['page_description']?></td>
					<td style="padding: 5px"><a href="delete.php?id=<?php echo $d['id']?> "onclick="return confirm('are you sure u want to delete')">
						delete
					</a></td>
					<td style="padding: 5px"><a href="edit.php?id=<?php echo $d['id']?>">edit</a></td>
					<!-- <td style="padding: 5px"><a href="addimage.php?id=<?php echo $d['id']?>">addimage</a></td> -->
				</tr> 	
				<?php } ?>
			</table>
			<br>
		
	</div>
	<?php } else{
		header('location:login.php');
		require_once('footer.php');
	}?>
	<br><br>
	<!-- <?php ;?> -->

</body>
</html>