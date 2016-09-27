
<?php
include_once "connect.php";
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$name = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT name FROM membercredentials WHERE name=:name");
$stmt->execute(array(":name"=>$name));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
//echo $userRow['name'];
//include "subhead.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h3><?php echo $userRow['name'];
?></h3>
</body>
</html>
<?php
include "subhead.php";
?>

