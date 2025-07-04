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
    $updatePass = "UPDATE users  SET password = '$password' WHERE id = $id"; 
    $queryPass=$conn->query($updatePass);


}


$updateUser= "UPDATE users 
                    SET
                    name = '$name',
                    email = '$email',
                    password = '$password',
                    address = '$address',
                    gender = '$gender',
                    priv = '$priv'
                    WHERE id = $id";

                
$query=$conn->query($updateUser);

if ($query) {
    header("Location: ../../users.php");
    exit(); 
} else {
    echo  $conn->error;
}
?>

?>