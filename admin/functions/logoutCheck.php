<?php
session_start();
include("connect.php");

$token = $_SESSION['auth_token'] ?? $_COOKIE['auth_token'] ?? null;

if ($token) {
    $stmt = $conn->prepare("UPDATE admins SET token = NULL WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
}


session_unset();
session_destroy();
setcookie("auth_token", "", time() - 3600, "/");
header("Location: ../login.php");
?>