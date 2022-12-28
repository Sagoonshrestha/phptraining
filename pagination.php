
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require_once('connect.php');
  $results_per_page = 3;  
  
    //find the total number of results stored in the database  
    $query = "select *from newsmanager";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  

  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT *FROM newsmanager LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  
    ?>
    <?php
    //display the retrieved result on the webpage  
    while ($row = mysqli_fetch_array($result)) { ?> 
         <img src="<?php echo $row['newsimage']?>" width="300px" height="300px">

    <?php } ?>  
  	<br><br>
  	<?php
    //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "pagination.php?page=' . $page . '" style=" align_self: center;">' . $page . ' </a>';  
	} 

	?>
</body>
</html>