<?php
	require_once('connect.php');
	$query = "SELECT * FROM subscribe";
	if (!$result = mysqli_query($conn, $query)) {
	    exit(mysqli_error($conn));
	}

	$users = array();
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	        $users[] = $row;
	    }
	}

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Users.csv');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('id', 'name', 'email', 'date_time'));

	if (count($users) > 0) {
	    foreach ($users as $row) {
	        fputcsv($output, $row);
	    }
	}
?>