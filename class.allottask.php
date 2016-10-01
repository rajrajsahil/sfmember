<?php
class allottask{
	private $db;
	public $uwork;
	public $ugiven_by;
	private $stask = "NO Task";
	private $empty = "";
	function __construct($conn){
		$this->db = $conn;
	}
	public function assignwork($work,$uname,$allotto){
		
		try
		{
			//echo $work;
			//echo $uname;
			//echo $allotto;
			//$stmt = $this->db->prepare("UPDATE taskalloted SET work=:work, head=:uname WHERE username =:allotto");
			$stmt = $this->db->prepare("UPDATE taskalloted SET work=:work, head=:head WHERE username=:username");
			$stmt->bindparam(":work", $work);
			$stmt->bindparam(":head", $uname);
			$stmt->bindparam(":username", $allotto);
			$stmt->execute();
		}
		catch(PDOException $e)
        {
           echo $e->getMessage();
        }    

	}
	public function freesubheads()
	{
		echo "<form action='home.php' method='post'> <textarea name='task' cols='20' rows='5'></textarea><br>";
		try
		{
			$stmt = $this->db->prepare("SELECT username FROM taskalloted WHERE work='NO Task'"); 
    		$stmt->execute();

    		// set the resulting array to associative
    		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    		foreach($stmt->fetchAll() as $v)
    		{
    			//echo $v['username'];

        		//$member[$i] = new subhead($v['username']);
        		//echo $member[i]->name;
        		//$i++;
        		echo "<input type='checkbox' name='subhead[".$v['username']."]' value = ".$v['username'].">".$v['username'];
    		}

		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
		echo "<input type='submit' name='submit' value='Alott Task'></form>";
	}
	public function editanddeletetask($uname)
	{   
		$task = $this->db->prepare("SELECT * FROM taskalloted"); 
    	$task->execute();
    	$result = $task->setFetchMode(PDO::FETCH_ASSOC);
    	foreach($task->fetchAll() as $t)
    	{
    		echo $t['username']."=".$t['work']."=".$t['head'];
    		if($t['head'] == $uname)
    		{   
    			echo "<textarea id=".$t['username']." name='task' cols='20' rows='5'></textarea>";
    			echo "<input type='text' name=".$t['username']." value=".$uname.">";
    			echo "<button class=".$t['username'].">Change Task</button>";
    			//echo "<input type='submit' class=".$t['username']." value='Remove task'><br>";
    			echo "<label><a href='delete.php?delete=true' class=".$t['username']."><i class='glyphicon glyphicon-log-out'></i>Remove from Task</a></label>";

    			//include "update.php";
    		}

		}

	}
	public function deletetask($sname)
	{	
		try
		{
    		//$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    		//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$stmt = $this->db->prepare("UPDATE taskalloted SET work=:work, head=:head WHERE username=:username");
    		$stmt->bindparam(":work", $this->stask);
    		$stmt->bindparam(":head", $this->empty);
    		$stmt->bindparam(":username", $sname);
    		$stmt->execute();
    		//echo "task get DELETED";
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
	}
	public function compleatedtask()
	{
		$task = $this->db->prepare("SELECT * FROM taskdone"); 
    	$task->execute();
    	$result = $task->setFetchMode(PDO::FETCH_ASSOC);
    	foreach($task->fetchAll() as $t)
    	{
    		echo $t['name']."=>".$t['workdone']."=>".$t['given_by']."<br>";
    	}	
	}
	public function gettask($name)
	{
		$stmt = $this->db->prepare("SELECT * FROM taskalloted WHERE username=:name"); 
    	$stmt->execute(array(":name"=>$name));
    	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    	//echo "Task Alloted : ".$userRow["work"]."<br> By:".$userRow["head"] ;
    	$this->uwork=$userRow["work"];
    	$this->ugiven_by=$userRow["head"];
	}
	public function viewtaskalloted()
	{
		$task = $this->db->prepare("SELECT * FROM taskalloted"); 
    	$task->execute();
    	$result = $task->setFetchMode(PDO::FETCH_ASSOC);
    	foreach($task->fetchAll() as $t)
    	{
    		echo $t['username']."=>".$t['work']."=>".$t['head']."<br>";
    	}	
	}
	
	public function updatebysubhead($name,$work,$given_by)
	{
		$stmt = $this->db->prepare("UPDATE taskalloted  SET work = :work,head =:given_by WHERE username= :name");
    	//$work="NO Task";
    	//$given_by="";
    	$stmt->bindValue(":work", $work);
    	$stmt->bindValue(":given_by", $given_by);
    	$stmt->bindValue(":name",$name);
    	$stmt->execute();
	}
}
//$updatework = new allottask($conn,$work,$subhead)
?>