<?php 
include("../connect.php");

$name     = $_POST["name"];
$email    = $_POST["email"];
$password = md5($_POST["password"]);
$address  = $_POST["address"];
$gender   = $_POST["gender"];
$priv     = $_POST["priv"];




$insertData = "INSERT INTO admins 
(name, email, password, address, gender, priv_id)
VALUES
('$name', '$email', '$password', '$address', '$gender', '$priv')";

$query=$conn->query($insertData);

if ($query) {
    header("Location: ../../admins.php");
    exit(); 
} else {
    echo  $conn->error;
}
?>
