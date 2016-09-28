
<?php
include_once "connect.php";
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$name = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM work_detail WHERE username=:name");
$stmt->execute(array(":name"=>$name));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
//echo $userRow['work'];
//include "subhead.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h3><?php echo $userRow['username'];
?></h3>

<button type="button" id="mytask" onclick="location='mytask.php'">MY TASK</button>
<button type="button" id="alltask"onclick="location='alltask.php'">ALL TASK</button>
</body>
</html>


