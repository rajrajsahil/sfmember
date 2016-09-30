<?php
//require "connect.php";
$work = $_POST["task"];
//echo $work;
$subhead = $_POST['subhead'];
include "class.allottask.php";
$j=0;
if(!empty($work)){
	foreach ($subhead as $key => $value) {
		$allotto = $subhead[$key];
		$abc[$j] = new allottask($conn,$work,$uname,$allotto);
		//echo $allotto;
		/*try{
		$stmt = $conn->prepare("UPDATE taskalloted SET work=:work, head=:uname WHERE username =:allotto");
		$stmt->bindparam(":work", $work);
		$stmt->bindparam(":uname", $uname);
		$stmt->bindparam(":allotto", $allotto);
		$stmt->execute();
		}
		catch(PDOException $e)
        {
           echo $e->getMessage();
        }*/

		//$stmt->execute(array(":name"=>$name));
	//echo $subhead[$key];
	}
	
}



echo "<form action='home.php' method='post'> <textarea name='task' cols='20' rows='5'></textarea><br>";
class subhead{
	
	public $name;
	

	function subhead($subhead){
		$this->name = $subhead;
		//echo "<input type='checkbox' name=".$subhead." value=".$subhead.">".$this->name."<br>";
	}
}
$i = 0;
//$subheadname array();
try{
	$stmt = $conn->prepare("SELECT username FROM taskalloted WHERE work='NO Task'"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach($stmt->fetchAll() as $v) {
    	//echo $v['username'];
        $member[$i] = new subhead($v['username']);
        //echo $member[i]->name;
        $i++;
    }

}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}

foreach ($member as $key => $value) {
	echo "<input type='checkbox' name='subhead[".$key."]' value = ".$member[$key]->name.">".$member[$key]->name;
	//echo "bro<br>";<>
}
//echo $member[0]->name;


echo "<input type='submit' name='submit' value='Alott Task'></form>";
//echo $uname;

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<button class="alltask">All Task</button>
<div id="view_edit">
	<?php
		//class alltask{
			//public function __construct(){
				$task = $conn->prepare("SELECT * FROM taskalloted"); 
    			$task->execute();
    			$result = $task->setFetchMode(PDO::FETCH_ASSOC);
    			foreach($task->fetchAll() as $t){
    						echo $t['username']."=".$t['work']."=".$t['head']."<br>";
    						if($t['head'] ==$uname){
    							echo "<textarea id=".$t['username']." name='task' cols='20' rows='5'></textarea>";
    							echo "<input type='text' name=".$t['username']." value=".$uname.">";
    							echo "<button class=".$t['username'].">Change Task</button>";
    							echo "<input type='submit' class=".$t['username']." value='Remove task'>";
    							//include "update.php";
    						}

						}
    			//}
		////}
		//$me = new alltask();
	?>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>