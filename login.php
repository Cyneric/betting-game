<?php

	include('src/settings.php');
	
	$auth_failed = FALSE;
	
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      session_start();
		
      $username = $_POST['username'];
      $password = $_POST['password'];

      $hostname = $_SERVER['HTTP_HOST'];
      $path = dirname($_SERVER['PHP_SELF']);
 
      
      
      //database connection - request user
      $con = mysqli_connect(Settings::dbHost, Settings::dbUser, Settings::dbPass, Settings::db);
      // Check connection
      if (mysqli_connect_errno()){
      	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $dbuser = mysqli_real_escape_string($con, $username);
      $dbpass = mysqli_real_escape_string($con, $password);

      $result = mysqli_query($con,"SELECT * FROM account WHERE username = '$dbuser' AND password = '$dbpass'");
      mysqli_close($con);
      
      while($row = mysqli_fetch_array($result))
      {
      	if(!empty($row['username'])){
      		$user =	$row['username'];
      		$account_id =	$row['id'];
      		$pass =	$row['password'];
      	}
      	else break;
      }
     
     //check login data
      if (isset($user) && isset($password) && $username == $user && $password == $pass) {
      	$_SESSION['logged_in'] = true;
      	$_SESSION['user'] = $user;
      	$_SESSION['account_id'] = $account_id;

       	// forwarding to index
       	if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
	        if (php_sapi_name() == 'cgi') {
	        	header('Status: 303 See Other');
	        }
	        else {
	         	header('HTTP/1.1 303 See Other');
	        }
       	}

       	header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
       	exit;
       }
       else $auth_failed = TRUE;
      }
?>


<!DOCTYPE html>				
<html lang="de">															
<head>		
	<meta charset="utf-8">
	<title></title>	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		a:link { color: grey; } 
		a:visited { color: grey; } 
		a:hover { color: grey; } 
		a:active { color: grey; } 
	</style>
</head>
<body>
    <div class="container" style="margin-top:10%;">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default">
            	<div class="panel-heading">
                	<div class="panel-title">Login:</div>
                	<!--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="">Passwort vergessen?</a></div>-->
                </div>     
                <div style="padding-top:30px" class="panel-body" >
                	<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>                           
                    <form action="login.php" method="post" id="loginform" class="form-horizontal" role="form">                                   
                    	<div style="margin-bottom: 25px" class="input-group">
                        	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" placeholder="Benutzername">                                        
                        </div>                                
                        <div style="margin-bottom: 25px" class="input-group">
                        	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                         	<input id="login-password" type="password" class="form-control" name="password" placeholder="Passwort">
                        </div>    
                        <?php if($auth_failed)echo "<div class='alert alert-danger'>Benutzername oder Passwort falsch!</div>"?>                               
                        <div style="margin-top:10px" class="form-group">
                        	<div class="col-sm-12 controls">
                            	<input type="submit" id="btn-login" class="btn btn-success" value="Login">
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-md-12 control">
                            	<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%"> Noch kein Accout? 
                                    <a href="register.php" onClick="$('#loginbox').hide(); $('#signupbox').show()">Registrieren</a>
                                </div>
                            </div>
                       	</div>    
                   	</form>     
                </div>                     
          	</div>  
        </div>
    </div>
</body>
</html>

