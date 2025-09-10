<?php 

include_once "../admin/functions/connect.php";
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];


$addMessage= "INSERT INTO message ( name , phone , email , message )
    VALUES
        ('$name', '$phone', '$email', '$message')";

$query=$conn->query($addMessage);
if($query) {
    echo '<div class=" alert alert-success  " > data success </div>';
}else {
    echo $conn->error ;
}     



?>