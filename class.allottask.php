<?php
class allottask{
	
	public function __construct($conn,$work,$uname,$allotto){
		
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

	}
}
//$updatework = new allottask($conn,$work,$subhead)
?>