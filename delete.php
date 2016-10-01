<?php
require "connect.php";
require "class.allottask.php";
if(isset($_GET['username'])) {
     $del = new allottask($conn);
     $del->deletetask($_GET['username']);
     //echo "dfuygbdjgbiur";
     header('Location: home.php');

}
else if(isset($_POST['sname'],$_POST['task']))
{
    $del = new allottask($conn);
    $val = $del->changetask($_POST['sname'],$_POST['task']);
    echo $val;
    //header('Location: home.php');
}
//$freesubhead->deletetask($sname);
//if($user->is_loggedin()){
//$user->redirect('index.php');}
//session_start();
/*$sname = $_POST['sname'];
$stask = "NO Task";
$head = "";
//echo $sname;

$servername = "localhost";
$username = "root";
$password = "Sahil@Raj1998";
$dbname = "sftaskmanager";
try
{
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("UPDATE taskalloted SET work=:work, head=:head WHERE username=:username");
     $stmt->bindparam(":work", $stask);
     $stmt->bindparam(":head", $head);
     $stmt->bindparam(":username", $sname);
     $stmt->execute();
     echo "task  get DELETED";
     //session_destroy();
     //unset($_SESSION['user_session']);
     //header("Location: index.php");
     //$sql = "INSERT INTO membercredentials (name,password)VALUES ('yooooo','kapoor')";
     // use exec() because no results are returned
     //$DB_con->exec($sql);
     //echo "New record created successfully";
}
catch(PDOException $e)
{
     echo $e->getMessage();
}
     //session_destroy();
     //unset($_SESSION['user_session']);
     header("Location: home.php");*/
?>