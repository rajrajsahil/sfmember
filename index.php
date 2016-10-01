
<?php
require_once "connect.php";
if($user->is_loggedin()!="")
	{
	 //$user->redirect('home.php');
	}
if(isset($_POST['username']))
{   
 	$uname = $_POST['username'];
 	$upass = $_POST['password'];
 
  
 	if($user->login($uname,$upass))
 	{
 		//echo  $_SESSION['user_session'];
 	 $user->redirect('home.php');
 	}
 	else
 	{
 	 $error = "Wrong Details !";
 	} 
}
?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="index.php" method="post">
Usename <input type="text" name="username" id="name">
Password <input type="password" name="password" id="password">
<input id="submit" type="submit" name="submit" value="login">
</form>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>
-->
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>LOGIN</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	<style>
	body{
		background-color: #84ffff;
	}
	#innerform {
		background-color:#f4ff81;
		margin-top: 10%;
	}
	</style>

</head>
<body>
	<div class="anyForm loginform" id="form">
		<div class="container z-depth-5" id="innerform">
			<div class="row">
			<br>
			
				<h2 class="center">LOGIN</h2>
				<br>
				<form name="event6" class="col s8 offset-s2" action="index.php" method="post" >
					<div class="row">
						<div class="input-field col s10 offset-s2">
							<i class="material-icons prefix">perm_identity</i>
							<input name="username" id="name" type="text">
							<label for="name">USERNAME</label>
						</div>
						<div class="input-field col s10 offset-s2">
							<i class="material-icons prefix">lock</i>
							<input name="password" id="password" type="password">
							<label for="password">PASSWORD</label>
						</div>
						<br>
						<br>
						</br>
						<div class="center">
							<button class="btn waves-effect waves-light" type="submit" id="btn">SIGN IN <i class="material-icons right">send</i></a>
						</div>
						<br>
						<br>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>