<?php 
session_start();
include("connect.php");

$name = trim($_POST["name"]);
$password = trim(md5($_POST["password"]));



$dataLogin = "SELECT * FROM users WHERE name='$name' AND password ='$password' ";
$query=$conn->query($dataLogin);

echo "<pre></pre>";

if($query && $query->num_rows > 0){

    $user=$query->fetch_assoc();
    $id=$user["id"];
    $_SESSION["login-id"]=$id;
    header("Location: ../index.php");
    exit;
} else {
    $_SESSION["login_error"]= "	<div class=' panel-body alert alert-danger'> wrong data </div> ";
    header("Location: ../login.php");
    exit;
}





?>