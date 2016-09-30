<?php
class diffrentiate
{
	private $ddb;
	public $member;
	public $por;
	function __construct($conn,$name)
	{
		$this->ddb = $conn;
		try
		{
			//$name = $_SESSION['user_session'];
			$stmt = $this->ddb->prepare("SELECT * FROM membercredentials WHERE name=:name");
			$stmt->execute(array(":name"=>$name));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			$this->member = $userRow['name'];
			$this->por = $userRow['position'];

		}
		catch(PDOException $e)
        {
           echo $e->getMessage();
        }
	}
	
}

$login = new diffrentiate($conn,$_SESSION['user_session']);
$uname =$login->member;
$position = $login->por;

?>