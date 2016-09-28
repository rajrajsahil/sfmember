<?php
	$stmt = $conn->prepare("SELECT * FROM taskalloted WHERE username=:name"); 
    $stmt->execute(array(":name"=>$name));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    echo "Task Alloted : ".$userRow["work"]."<br> By: ".$userRow['head'];
?>