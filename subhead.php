<?php
    include "class.allottask.php";
    //require_once "connect.php";
    $name = $_SESSION['user_session'];
    $subhead = new allottask($conn);
	 /*$stmt = $conn->prepare("SELECT * FROM taskalloted WHERE username=:name"); 
    $stmt->execute(array(":name"=>$name));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    echo "Task Alloted : ".$userRow["work"]."<br> By:".$userRow["head"] ;
    $uwork=$userRow["work"];
    $ugiven_by=$userRow["head"];*/
    


 
    if (isset($_POST['submit'])&& $_SESSION['work']!="")
    {
        if (!empty($_POST['grade']))
        {
            if($user->register($name,$_SESSION['work'],$_SESSION['given_by']))
            {
     	          $subhead = new allottask($conn);
                $subhead->deletetask($name);
                //echo "<i>success</i>";
            }
     /*$stmt = $conn->prepare("UPDATE taskalloted  SET work = :work,head =:given_by WHERE username= :name ");
     $work="NO Task";
     $given_by="";
     $stmt->bindValue(":name", $name);
     $stmt->bindValue(":work", $work);
     $stmt->bindValue(":given_by",$given_by);
     $stmt->execute();*/
        }
     //header("Refresh:0");
    }
    //$subhead = new allottask($conn);
    $s_task = $subhead->gettask($name);
    foreach ($s_task as $st) {
      echo  "Task Alloted : ".$st['work']."<br> By:".$st['head'] ;
      $_SESSION['work'] = $st['work'];
      $_SESSION['given_by'] = $st['head'];
    }
    //echo "Task Alloted : ".$subhead->uwork."<br> By:".$subhead->ugiven_by ;
    //$_SESSION['work']=$subhead->uwork;
    //$_SESSION['given_by']=$subhead->ugiven_by;

    

?>

<html>
     <head>
     
     <body>

<form action="home.php" method="post">
<label>completed Tasks<input type="checkbox" name="grade" value="yes"></label><br>
  <input type="submit" name="submit" value="submit">
</form>
</br>
<button id="show">ALL TASK-show</button>
<div id="allotedtask">
    <p>
	      <?php 
              
            $alltedtask = $subhead->viewtaskalloted();
            foreach ($alltedtask as $key)
            {
                echo $key['username']."=>".$key['work']."=>".$key['head']."<br>";
            }
                         /*class subhead{
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
                            }*/


        ?>
      </br>
      <h3> work already completed</h3>
    </p>
    <p>
        <?php
            $comp_task = $subhead->compleatedtask();
            foreach ($comp_task as $ct) {
              echo $ct['name']."=>".$ct['workdone']."=>".$ct['given_by']."<br>";
            }
                          /*class allsubhead{
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
                           }*/
        ?>
            </p>
</div>
      <script type="text/javascript" src="jquery.js"></script>
      <!--  <script type="text/javascript" src="subhead.js"></script>-->
      <script type="text/javascript">
          $("#allotedtask").hide();
          $("#show").click(function(){
          //$("#allotedtask")
          $("#allotedtask").toggle();
          });
      </script>
        
      </body>
      </head>
</html>