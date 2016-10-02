
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css">
<style>
body {
    background-color: #ea80fc;
}
h1{
	font-family: Verdana;
	text-align: center;
	font-size: 45px;
}

</style>
    <title></title>
</head>
<body>
<div class="col s12 m7">
<h1 class="header"><?php echo "Welcome "."".$uname."";
?></h1>
</div>
<div class="row" id="logout_btn">
<div class="col s12">
<label><a class='waves-light btn' href="logout.php?logout=true" id="logout"><i class="glyphicon glyphicon-log-out"></i> LOGOUT </a></label>
</div>
</div>
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

