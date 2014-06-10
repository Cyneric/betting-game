<?php

 	include('settings.php');
 	

 	$match_id = $_GET['match_id'];
 	$account_id = $_GET['account_id'];
	
 
 	
 	$con = mysqli_connect(Settings::dbHost, Settings::dbUser, Settings::dbPass, Settings::db);
 	if (mysqli_connect_errno()){
 		echo "Failed to connect to MySQL: " . mysqli_connect_error();
 	}
 	
 		mysqli_query($con,"DELETE FROM bettings WHERE match_id = '$match_id' AND account_id = $account_id");
 	
 	mysqli_close($con);
 	
?>