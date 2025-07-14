<?php 
session_start();
include("../connect.php");

$role= $_SESSION["role"];
if ($role < 500) {
    echo " هذه العملية مسموحة فقط للـ owner.";
    exit;
}
$id=$_GET["id"];
$delete="DELETE FROM admins WHERE id= $id";
$query=$conn->query("$delete");
if(!$query){
    echo $conn->error;
}else{
    header("location:../../admins.php");
}
?>