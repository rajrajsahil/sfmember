<?php
	$stmt = $conn->prepare("SELECT * FROM work_detail WHERE username=:name"); 
    $stmt->execute(array(":name"=>$name));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    echo "Task Alloted : ".$userRow["work"]."<br> By:".$userRow["given_by"] ;
?>

<html>
     <head>
     </head>
     <body>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script>
               $(document).ready(function(){
           	   $("div").hide();
               $("#hide").click(function(){
               $("div").hide();
                  });
               $("#show").click(function(){
               $("div").show();
                  });
               });
         </script>
         </br>
         <button id="hide">ALL TASK-hide</button>
         <button id="show">ALL TASK-show</button>
       <div>
              <p>
	                 <?php
                         class subhead{
	                         private $name;
	                          function subhead($subhead,$work,$given_by){
		                     if($work==NULL){
			                 $work="no work";
		                     }
		                     echo $subhead." "."-work alloted: ".$work."<br>"."given by"." - ".$given_by."<br>" ;
	                         }
                            }
                        $i = 0;
                        try{
	                         $stmt = $conn->prepare("SELECT * FROM work_detail "); 
                             $stmt->execute();

    // set the resulting array to associative
                              $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                               foreach($stmt->fetchAll() as $v) {
    	//echo $v['username'];
    	                       $member[$i] = new subhead($v['username'],$v['work'],$v['given_by']);
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
	                         function allsubhead($subhead,$work){
		                    if($work==NULL){
			                 $work="no work";
			                 }
                           echo $subhead." "."-work alloted: ".$work."<br>"."given by"." - ".$given_by."<br>" ;
                            }
                            }
                          $i = 0;
                          try{
                             $stmt = $conn->prepare("SELECT * FROM work_completed "); 
                             $stmt->execute();

                             $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                              foreach($stmt->fetchAll() as $v) {
    	//echo $v['username'];
    	
                               $member[$i] = new allsubhead($v['username'],$v['workdone'],$v['given_by']);
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