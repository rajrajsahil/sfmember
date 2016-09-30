<?php
    //require_once "connect.php";
    $name = $_SESSION['user_session'];
	$stmt = $conn->prepare("SELECT * FROM taskalloted WHERE username=:name"); 
    $stmt->execute(array(":name"=>$name));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    echo "Task Alloted : ".$userRow["work"]."<br> By:".$userRow["head"] ;
    $uwork=$userRow["work"];
    $ugiven_by=$userRow["head"];
 
  if (isset($_POST['submit'])&& $uwork!="") {
    if (!empty($_POST['grade'])) {
     if($user->register($name,$uwork,$ugiven_by)){
     	echo "success";
     }
     
     $stmt = $conn->prepare("UPDATE taskalloted  SET work = :work,head =:given_by WHERE username= :name ");
     $work="NO Task";
     $given_by="";
     $stmt->bindValue(":name", $name);
     $stmt->bindValue(":work", $work);
     $stmt->bindValue(":given_by",$given_by);
     $stmt->execute();
     }
     header("Refresh:0");
}
    

?>

<html>
     <head>
     </head>
     <body>

<form action="home.php" method="post">
<input type="checkbox" name="grade" value="yes"><br>
  <input type="submit" name="submit" value="submit">
</form>


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script>
               $(document).ready(function(){
           	   $("div").hide();
               $("#show").click(function(){
               $("div").show();
                  });
               })
         </script>
         </br>
        
         <button id="show">ALL TASK-show</button>
       <div>
              <p>
	                 <?php
                         class subhead{
	                         private $name;
	                          function subhead($subhead,$work,$given_by){
		                     if($work=="No Task"){

			                 $given_by="N.A";
		                     }

		                     echo $subhead." "."-work alloted: ".$work."<br>"."given by"." - ".$given_by."<br>" ;
	                         }
                            }
                        $i = 0;
                        try{
	                         $stmt = $conn->prepare("SELECT * FROM taskalloted "); 
                             $stmt->execute();

    // set the resulting array to associative
                              $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                               foreach($stmt->fetchAll() as $v) {
    	//echo $v['username'];
    	                       $member[$i] = new subhead($v['username'],$v['work'],$v['head']);
                                 $i++;
                             }}
                           catch(PDOException $e){
	                       echo "Error: " . $e->getMessage();
                            }

                     ?>
              </br>
              <h3> work already completed</h3>
              </p>
              <p>
                      <?php
                          class allsubhead{
	                         private $name;
	                         function allsubhead($subhead,$work,$given_by){
		                    if($work=="No Task"){
			                 //$work="no work";
			                 $given_by="N.A";
			                 }
                           echo $subhead." "."-work completed: ".$work."<br>"."given by"." - ".$given_by."<br>" ;
                            }
                            }
                          $i = 0;
                          try{
                             $stmt = $conn->prepare("SELECT * FROM taskdone"); 
                             $stmt->execute();

                             $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                              foreach($stmt->fetchAll() as $v) {
    	//echo $v['username'];
    	
                               $member[$i] = new allsubhead($v['name'],$v['workdone'],$v['given_by']);
                               $i++;
                             }

                             }
                             catch(PDOException $e){
	                         echo "Error: " . $e->getMessage();
                           }
                        ?>
              </p>
        
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="subhead.js"></script>
        </div>
     </body>
</html>