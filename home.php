
<?php
include_once "connect.php";
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$name = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM membercredentials WHERE name=:name");
$stmt->execute(array(":name"=>$name));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
$name = $userRow['name'];
//echo $userRow['name'];
//include "subhead.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h3><?php echo $name;
?></h3>
</body>
</html>
<?php
if($userRow['designation']=='head'){
    include "head.php";
}
else{
    include "subhead.php";
}
?>

