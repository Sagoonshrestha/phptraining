<?php
require_once('connect.php');
	$sql2="select priority from assignpmanager order by priority desc";
  	$result2=$conn->query($sql2);
  	$int=[];
  	while ($row2 = $result2 -> fetch_assoc()) {
    	// printf("%s", $row2);
    	$int[]=$row2['priority'];

  	}
  	 print_r($int);
  	 echo "<br>";
 //  	 sort($int);
  	$clength = count($int);
	for($x = 0; $x < $clength; $x++) {
	  echo $int[$x];
	  echo "<br>";
	}
	$sql="select * from assignpmanager order by priority desc";
	$result=$conn->query($sql);
	$detail =[];
	while($row=$result->fetch_assoc())
	{
		$detail[]=$row;
	}
	echo "<pre>";
	print_r($detail);
	echo "</pre>";
	$arr=[];
	foreach($detail as $a){
		$arr[]= $a['page_title'];
	}
  	// var_dump($row2);
  	print_r($arr);
?>