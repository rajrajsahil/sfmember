
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
    <title></title>
</head>
<body>
<h3><?php echo $uname;
?></h3>
<label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
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

