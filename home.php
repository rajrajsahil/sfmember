
<?php
require_once "connect.php";
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$name = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM login_detail WHERE username=:name");
$stmt->execute(array(":name"=>$name));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
$name = $userRow['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h3><?php echo $name;
?></h3>
 <label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
</body>
</html>
<?php
if($userRow['designation']=='head'){
    include "head.php";
}
if($userRow['designation']=='subhead'){
 include "subhead.php";}
?>

