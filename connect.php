<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Sahil@Raj1998";
$dbname = "sftaskmanager";

//$DB_name = "dblogin";

try
{
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //$sql = "INSERT INTO membercredentials (name,password)VALUES ('yooooo','kapoor')";
     // use exec() because no results are returned
     //$DB_con->exec($sql);
     //echo "New record created successfully";
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

include_once 'class.user.php';
$user = new user($conn);

//include_once 'class.user.php';
//$user = new USER($DB_con);

/**$servername = "localhost";
$username = "root";
$password = "Sahil@Raj1998";
$dbname = "sftaskmanager";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO membercredentials (name,password)VALUES ('sahil Raj','alokkumar')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;**/
?>

