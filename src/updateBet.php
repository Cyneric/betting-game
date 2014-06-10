<?php

 	include('settings.php');
 	

 	$match_id = $_GET['match_id'];
 	$account_id = $_GET['account_id'];
 	$bet_home = $_GET['bet_home'];
 	$bet_guest = $_GET['bet_guest'];
 	
 	$insert = true;
 	
 	$con = mysqli_connect(Settings::dbHost, Settings::dbUser, Settings::dbPass, Settings::db);
 	if (mysqli_connect_errno()){
 		echo "Failed to connect to MySQL: " . mysqli_connect_error();
 	}
 	
 	$match_id = mysqli_real_escape_string($con, $match_id);
 	$account_id = mysqli_real_escape_string($con, $account_id);
 	$bet_home = mysqli_real_escape_string($con, $bet_home);
 	$bet_guest = mysqli_real_escape_string($con, $bet_guest);
 	
 	//check if entry already exist
 	$result = mysqli_query($con,"SELECT * FROM bettings WHERE account_id = '$account_id' AND match_id = '$match_id'");
 	
 	while($row = mysqli_fetch_array($result)){
 		if(!empty($row['account_id'])){
			//tipp bereits abgegeben
 			$insert = false;
 		}
 	}
 	
 	if($insert){
 		echo "INSERT into bettings (match_id, account_id, bet_home, bet_guest) VALUES ('$match_id', '$account_id', '$bet_home', '$bet_guest'";
 		mysqli_query($con,"INSERT into bettings (match_id, account_id, bet_home, bet_guest) VALUES ('$match_id', '$account_id', '$bet_home', '$bet_guest')");
 	}
 	
 	mysqli_close($con);
 	
?>