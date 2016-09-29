<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

try
{
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

include_once 'class.user.php';
$user = new user($conn);
?>

