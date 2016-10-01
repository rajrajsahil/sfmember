
<?php
include_once "connect.php";
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
include "class.diffrentiate.php";
/*$name = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM membercredentials WHERE name=:name");
$stmt->execute(array(":name"=>$name));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
$uname = $userRow['name'];
$position = $userRow['position'];*/
//echo $userRow['name'];
//include "subhead.php";
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: #ea80fc;
}
h1{
	font-family: Verdana;
	text-align: center;
	font-size: 45px;
}
#logout{
	color: blue;
	font-family: Verdana;
	font-size: 30px;
	float:centre;
	margin-left: 45%;
}
</style>
    <title></title>
</head>
<body>
<h1><?php echo "Welcome "."'".$uname."'";
?></h1>
<label><a href="logout.php?logout=true" id="logout"><i class="glyphicon glyphicon-log-out"></i> LOGOUT</a></label><br>
</body>
</html>
<?php
if($position=="head"){
    include "head.php";
}
else{
    include "subhead.php";
}

?>

