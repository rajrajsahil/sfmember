<?php
class user {
	private $db;
	function user($conn){
		$this->db = $conn;
	}
	public function login($uname,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM membercredentials WHERE name=:uname AND password=:upass LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':upass'=>$upass));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             
                $_SESSION['user_session'] = $userRow['name'];
                return true;
             
             
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   public function register($name,$work,$given_by)
    {
       try
       {
           
   
           $stmt = $this->db->prepare("INSERT INTO taskdone(name,workdone,given_by) 
                                                       VALUES(:uname, :uwork, :ugiven_by)");
              
           $stmt->bindparam(":uname", $name);
           $stmt->bindparam(":uwork", $work);
           $stmt->bindparam(":ugiven_by", $given_by);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
   public function redirect($url)
   {
       header("Location: $url");
   }
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>