
<?php
session_start();
require_once('connect.php');
if($conn->connect_errno==0){
	$sql="select * from assignpmanager order by priority desc";
	$result=$conn->query($sql);
  // $sql2="select priority from assignpmanager";
  // $result2=$conn->query($sql2);
  // while ($row2 = $result2 -> fetch_array()) {
  //   printf("%s", $row2[0]);
  // }
  // var_dump($row2);
  // print_r($row2);
	$detail =[];
	while($row=$result->fetch_assoc())
	{
		$detail[]=$row;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
	<title>header</title>
	<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  /*position: relative;*/
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.mydropdown1 {
  float: left;
  overflow: hidden;
}

.mydropdown1 .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.mydropdown1 {
	/*position: relative;*/
}
.dropbtn{
	position: relative;
}
.navbar a:hover, .mydropdown1:hover .dropbtn {
  background-color: red;
}

.mydropdown1-content {
  display: none;
  position: absolute;
  /*left: 500px;*/
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.mydropdown1-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.mydropdown1-content a:hover {
  background-color: #ddd;
}

/*
.mydropdown1:hover .mydropdown1-content {
  display: block;
}*/
.mydropdown2 {
  float: left;
  overflow: hidden;
}

.mydropdown2 .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.mydropdown2 {
	/*position: relative;*/
}
.dropbtn{
	position: relative;
}
.navbar a:hover, .mydropdown2:hover .dropbtn {
  background-color: red;
}

.mydropdown2-content {
  display: none;
  position: absolute;
  /*left: 500px;*/
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.mydropdown2-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.mydropdown2-content a:hover {
  background-color: #ddd;
}
/*dropdown3*/
</style>
</head>
<body>
<div class="navbar">
  <a href="admin.php">Admin manager</a>
  <a href="pagemanager.php">Page manager</a>
  <a href="imagemanager.php">News manager</a>
  <div class="mydropdown1">
    <button class="dropbtn">Shop
    </button>
    <div class="mydropdown1-content">
      <?php foreach($detail as $d) { ?>
      <a href="pagedetail.php?id=<?php echo $d['id']?>"><?php echo $d['page_title'];?></a>
      <?php } ?>
    </div>
  </div> 
  <a href="logout.php">logout</a>
</div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.mydropdown1').on({
			mouseenter: function() {
				$('.mydropdown1-content').show();
			}, mouseleave: function() {
				$('.mydropdown1-content').hide();
			}
		});
		$('.mydropdown2').on({
			mouseenter: function() {
				$('.mydropdown2-content').show();
			}, mouseleave: function() {
				$('.mydropdown2-content').hide();
			}
		});
	});
</script>
</body>
</html>