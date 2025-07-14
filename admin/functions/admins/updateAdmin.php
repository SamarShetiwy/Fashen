<?php  

include("../connect.php");

$id= $_GET["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$address = $_POST["address"];
$gender = $_POST["gender"];
$priv  = $_POST["priv"];


if(!empty($_POST["password"])){
    $updatePass = "UPDATE admins  SET password = '$password' WHERE id = $id"; 
    $queryPass=$conn->query($updatePass);


}


$updateAdmin= "UPDATE admins 
                    SET
                    name = '$name',
                    email = '$email',
                    password = '$password',
                    address = '$address',
                    gender = '$gender',
                    priv_id = '$priv'
                    WHERE id = $id";

                
$query=$conn->query($updateAdmin);

if ($query) {
    header("Location: ../../admins.php");
    exit(); 
} else {
    echo  $conn->error;
}
?>

?>