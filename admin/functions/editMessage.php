<?php

include "connect.php";

$messageID =$_POST['messageId'];
$updateView= "UPDATE message SET view = 1  WHERE  id= $messageID";
$query= $conn->query($updateView);

if(!$query){
    echo $conn->error;
}else{
    $messageNew="SELECT * FROM message WHERE view= 0";
	$queryNew=$conn->query($messageNew);
	$count=$queryNew->num_rows;
    echo $count;
}



?>