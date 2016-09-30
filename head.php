<?php
require "connect.php";


echo "<form action='head.php' method='post'> <textarea name='task' cols='20' rows='5'></textarea><br>";
class subhead{
	
	private $name;
	

	function subhead($subhead){
		$this->name = $subhead;
		echo "<input type='checkbox' name='subhead' value=".$subhead.">".$this->name."<br>";
	}
}
$i = 0;
try{
	$stmt = $conn->prepare("SELECT username FROM login_detail WHERE work=''"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach($stmt->fetchAll() as $v) {
    	//echo $v['username'];
        $member[i] = new subhead($v['username']);
        $i++;
    }

}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}
echo "<input type='submit' name='submit' value='Alott Task'></form>"
?>