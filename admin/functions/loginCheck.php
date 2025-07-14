<?php 
session_start();
include("connect.php");

$name = trim($_POST["name"]);
$password = trim(md5($_POST["password"]));
$remember= isset($_POST["remember"]);



$dataLogin = "SELECT * FROM admins WHERE name='$name' AND password ='$password' ";
$query=$conn->query($dataLogin);


echo "<pre></pre>";

if($query && $query->num_rows > 0){

    $admin=$query->fetch_assoc();
    $id=$admin["id"];
    $priv_id = $admin["priv_id"];

    $getPriv = $conn->query("SELECT priv FROM privliges WHERE id = $priv_id");
    $priv = $getPriv->fetch_assoc();
    $role = $priv['priv'];
    $_SESSION["role"] = $role;
    $_SESSION["admin"] = $id;

    $token = bin2hex(random_bytes(32));
    $update = "UPDATE admins SET token='$token' WHERE id=$id";
    $conn->query($update);

    if ($remember) {
        setcookie("auth_token", $token, time() + (7 * 24 * 60 * 60), "/", "", false, true);
    } else {
        $_SESSION["auth_token"] = $token;
    }

    if ( $role > 100) {
        header("Location:../index.php");
    } else {
        header("Location: ../../index.php");
    }

    exit;
} else {
    $_SESSION["login_error"]= "	<div class=' panel-body alert alert-danger'> wrong data </div> ";
    header("Location: ../login.php");
    exit;
}


?>