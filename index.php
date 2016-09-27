<?php
require_once "connect.php";
if($user->is_loggedin()!="")
	{
	 $user->redirect('head.php');
	}
if(isset($_POST['username']))
{
 	$uname = $_POST['username'];
 	$upass = $_POST['password'];
 
  
 	if($user->login($uname,$upass))
 	{
 	 $user->redirect('head.php');
 	}
 	else
 	{
 	 $error = "Wrong Details !";
 	} 
}
?>
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

<!--
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="main.js"></script>
-->
</body>
</html>