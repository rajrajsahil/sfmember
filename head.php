<?php
include "class.allottask.php";
//require "connect.php";
$work = $_POST["task"];
//echo $work;
$subhead = $_POST['subhead'];
//include "class.allottask.php";
$j=0;
if(!empty($work))
{
	$abc = new allottask($conn);
	foreach ($subhead as $key => $value)
	{
		$allotto = $subhead[$key];
		//echo $work."<br".$uname."br".$allotto;
		$abc->assignwork($work,$uname,$allotto);
		//echo $allotto;
		/*
		try{
		$stmt = $conn->prepare("UPDATE taskalloted SET work=:work, head=:uname WHERE username =:allotto");
		$stmt->bindparam(":work", $work);
		$stmt->bindparam(":uname", $uname);
		$stmt->bindparam(":allotto", $allotto);
		$stmt->execute();
		}
		catch(PDOException $e)
        {
           echo $e->getMessage();
        }
		*/
		//$stmt->execute(array(":name"=>$name));
	//echo $subhead[$key];
	}
	
}


$freesubhead = new allottask($conn);
$f_sheads = $freesubhead->freesubheads();
/*echo "<form action='home.php' method='post'> <textarea name='task' cols='20' rows='5'></textarea><br>";
foreach ($f_sheads as $sh) {
	// print_r($sh);
	echo "<input type='checkbox' name='subhead[".$sh['username']."]' value = ".$sh['username'].">".$sh['username']."<br>";
}
echo "<input type='submit' name='submit' value='Alott Task'></form>";*/
/*
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
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<style>
	body{
	color:black;
	background-color: #40c4ff;
	text-align: center;
}
    #view{
    	 border: 0px black solid ;
          color:brown;
          font-size: 25px;
          text-align: center;
          background-color:#e0e0e0;
          margin-left: 10%;
          margin-right: 10%;
          font-family: Verdana;
    }

   #view_edit{
    	 border: 0px black solid ;
          color:brown;
          font-size: 25px;
          text-align: center;
          background-color:#e0e0e0;
          margin-left: 10%;
          margin-right: 10%;
          font-family: Verdana;
    }
      .completedtask{
    margin-left: 43.5%;
  margin-right: 40%;
  text-align: center;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
     font-family: Verdana;
}
.completedtask  {
    background-color: white;
    color: black;
    border: 2px solid #4CAF50;
}

.completedtask:hover {
    background-color: #4CAF50;
    color: white;
}
.alltask{
    margin-left: 43.5%;
  margin-right: 40%;
  text-align: center;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
     font-family: Verdana;
}
.alltask  {
    background-color: white;
    color: black;
    border: 2px solid #4CAF50;
}

.alltask:hover {
    background-color: #4CAF50;
    color: white;
}
 #alot{
          font-size: 25px;
          color:brown;
          text-align: center;
          border: 0px black solid;
          background-color: #ffcdd2;
          margin-left: 10%;
          margin-right: 10%;
           font-family: Verdana;
          
        }
	</style>
</head>
<body>
<br>
<div id="alot">
<br>
<?php
echo "<form action='home.php' method='post'> <textarea name='task' cols='20' rows='5'></textarea><br>";
foreach ($f_sheads as $sh) {
	// print_r($sh);
	echo "<input type='checkbox' name='subhead[".$sh['username']."]' value = ".$sh['username'].">".$sh['username']."<br>";
}
echo "<input type='submit' name='submit' value='Alott Task'></form><br>";
?>
</div>
<br>
<br>
<div>
<button class="alltask">All Task</button>
<div id="view_edit">
<br>
	<?php
	    $e_task = $freesubhead->editanddeletetask($uname);
	    foreach ($e_task as $t)
	    {
	     	echo $t['username']." => ".$t['work']." => ".$t['head']."<br><br>";
    		if($t['head'] == $uname)
    		{   
    			echo "<textarea id=".$t['username']." name='task' cols='20' rows='5'></textarea>";
    			echo "<input type='text' name=".$t['username']." value=".$uname.">";
    			echo "<button class=".$t['username'].">Change Task</button>";
    			//echo "<a href='delete.php?username=".$t['username']."&'></a>";
    			//echo "<input type='submit' class=".$t['username']." value='Remove task'><br>";
    			echo "<label><a href='delete.php?delete=true&username=".$t['username']."' class=".$t['username']."><i class='glyphicon glyphicon-log-out'></i>Remove from Task</a></label><br>";

    			//include "update.php";
    		}
	     	
	    }
		//class alltask{
			//public function __construct(){
			/*	$task = $conn->prepare("SELECT * FROM taskalloted"); 
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

						}*/
    			//}
		////}
		//$me = new alltask();
	?>
</div>
<br>
<button class="completedtask">Show completed task</button>
<br>
<div id="view">
<br>
	<?php
		$c_task = $freesubhead->compleatedtask();
		foreach($c_task as $c)
		{
			echo $c['name']." => ".$c['workdone']." => ".$c['given_by']."<br><br>";
		}
	?>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>