
<?php 

$id=$_GET["id"];

include("../connect.php");
$delete="DELETE FROM products WHERE id= $id";
$query=$conn->query("$delete");
if(!$query){
    echo $conn->error;
}else{
    header("location:../../products.php");
}
?>