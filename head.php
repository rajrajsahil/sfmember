<?php
require "connect.php";
include "subhead.php";
$username = $_POST['username'];
$password = $_POST['password'];
//echo $password;

try {
    $stmt = $conn->prepare("SELECT name FROM membercredentials WHERE name='$username' AND password='$password'"); 
    $stmt->execute();

    // set the resulting array to associative
   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    	


    foreach($stmt->fetchAll() as $v) { 
       $name = $v['name'];
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

if(empty($name)){
    header('Location: index.html');
}else{
    echo "hi".$name;
    //include "subhead.php";
}
/*while($result = $sql->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
<td><?php echo $result['field1'];?></td>
<td><?php echo $result['field2'];?></td>

</tr>
<?php } ?>*/
	
?>


