<?php include('src/header.php'); ?>

<script>
$(document).ready( function(){
	$('#datatable').dataTable();
});
	
function updateBet(match_id, account_id){

	var bet_home = Number($("#bet_home_"+match_id+"").val());
	var bet_guest = Number($("#bet_guest_"+match_id+"").val());


	if(isNaN(bet_home) == false && isNaN(bet_guest) == false){

		$.ajax({
			  url: "src/updateBet.php?match_id="+match_id+"&account_id="+account_id+"&bet_home="+bet_home+"&bet_guest="+bet_guest+""
			}).done(function() {
			//	$("#bet_"+match_id+"").html(""+bet_home+" : "+bet_guest+"");
				$("#success").fadeTo(0,1);
				$("#success").fadeTo(3000,0);
				location.reload();
			});
	}

	else alert('nur Zahlen erlaubt!');
	
}
	
function deleteBet(match_id, account_id){
	$.ajax({
			  url: "src/deleteBet.php?match_id="+match_id+"&account_id="+account_id+"&delete_bet=true"
			}).done(function() {
				//$("#bet_"+match_id+"").html("<span><input type='text' id='bet_home_"+match_id+"' name='bet_home' style='width:15px;'> : <input type='text' id='bet_guest_"+match_id+"' name='bet_guest' style='width:15px;'></span>");
				$("#deleted").fadeTo(0,1);
				$("#deleted").fadeTo(3000,0);
				location.reload();
			});	
}
</script>

<?php 

	$con = mysqli_connect(Settings::dbHost, Settings::dbUser, Settings::dbPass, Settings::db);
	$query = "SELECT * FROM encounters" or die("Error in the consult.." . mysqli_error($con));
	$betsQuery = "SELECT * FROM bettings WHERE account_id = '".$_SESSION['account_id']."'" or die("Error in the consult.." . mysqli_error($con));
	$result = $con->query($query);
	$bets = $con->query($betsQuery);
	
	$bettings = array();
	while($temp = mysqli_fetch_array($bets)) {
		$bettings[$temp['match_id']]['match_id']=$temp['match_id'];
		$bettings[$temp['match_id']]['bet_home']=$temp['bet_home'];
		$bettings[$temp['match_id']]['bet_guest']=$temp['bet_guest'];
	}
	
?>
<div id="inner_content">
	<div class="alert alert-success" id="success" align="center" style="opacity:0.0;position:absolute;margin-left:40%;top:60px;">Dein Tipp wurde angenommen!</div>
	<div class="alert alert-danger" id="deleted" align="center" style="opacity:0.0;position:absolute;margin-left:40%;top:60px;">Dein Tipp wurde gel&ouml;scht!</div>
	<div style="margin-top:60px;"></div>
	<table id="datatable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Spieltag</th>
                <th>Datum</th>
                <th>Zeit</th>
                <th>Ort</th>
                <th>Gruppe</th>
                <th>Heim</th>
                <th>Gast</th>
                <th>Tipp</th>
                <th>Ergebnis</th>
				<th>Status</th>
            </tr>
        </thead>

        <tbody>   
		    <?php while($row = mysqli_fetch_array($result)) {  ?> 
      		<tr id="<?php echo $row['id'];?>">  
      			<td><?php if($row['id'] <= 18) echo "1"; if($row['id'] > 18 && $row['id'] <= 34) echo "2"; if($row['id'] > 34 && $row['id'] <= 50) echo "3";?></td>
                <td><?php echo date("d.m.Y",strtotime($row['start_time']));?></td>
                <td><?php echo date("H:i:s",strtotime($row['start_time']));?></td>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['team'];?></td>
                <td><img src="img/icons/<?php echo utf8_decode($row['home']);?>.png" height="30"> <?php echo utf8_decode($row['home']);?></td>
                <td><img src="img/icons/<?php echo utf8_decode($row['guest']);?>.png" height="30"> <?php echo utf8_decode($row['guest']);?></td>
                <td id="bet_<?php echo $row['id'];?>">
					<?php if(empty($bettings[$row['id']])){?><span><input type="text" id="<?php echo "bet_home_".$row['id'];?>" name="bet_home" style="width:15px;"> : <input type="text" id="<?php echo "bet_guest_".$row['id'];?>" name="bet_guest" style="width:15px;"></span>
					<span class="glyphicon glyphicon glyphicon-ok" id="bet_<?php echo $row['id'];?>" title="Tipp speichern" style="color:green;cursor:pointer;" onclick="updateBet('<?php echo $row['id'] ?>', '<?php echo $_SESSION['account_id'] ?>');"></span>
					<?php } else {?><span><?php echo $bettings[$row['id']]['bet_home'] ?> : <?php echo $bettings[$row['id']]['bet_guest'] ?></span>
					<span class="glyphicon glyphicon glyphicon-remove" title="Tipp l&ouml;schen" style="color:red;cursor:pointer;" onclick="deleteBet('<?php echo $row['id'] ?>', '<?php echo $_SESSION['account_id'] ?>');"></span><?php }?>
				</td>
                <td><span style="margin-left:40%;"><?php echo $row['result_home'];?>:<?php echo $row['result_guest'];?></span></td>
				<td>
					<?php if(empty($bettings[$row['id']])){?><span class="glyphicon glyphicon glyphicon-record" title="noch nicht gespielt" style="color:red;cursor:pointer;margin-left:35%;"></span>
					<?php }else{?><span class="glyphicon glyphicon glyphicon-record" title="Tipp abgegeben" style="color:orange;cursor:pointer;margin-left:35%;"></span><?php } ?>
				</td>
			</tr>
            <?php }?>
        </tbody>
    </table>
</div>
<?php include('src/footer.php'); ?>
