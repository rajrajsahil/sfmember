<?php
session_start();
$sname = $_POST['sname'];
$stask = $_POST['task'];

//echo $sname;

$servername = "localhost";
$username = "root";
$password = "Sahil@Raj1998";
$dbname = "sftaskmanager";
try
{
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("UPDATE taskalloted SET work=:work WHERE username=:username AND head=:head");
     $stmt->bindparam(":work", $stask);
     $stmt->bindparam(":username", $sname);
     $stmt->bindparam(":head", $_SESSION['user_session']);
     $stmt->execute();
     echo "done";
     //header("Location: index.php");
     //header("Location: home.php");
     //$sql = "INSERT INTO membercredentials (name,password)VALUES ('yooooo','kapoor')";
     // use exec() because no results are returned
     //$DB_con->exec($sql);
     //echo "New record created successfully";
}
catch(PDOException $e)
{
     echo $e->getMessage();
}
?>