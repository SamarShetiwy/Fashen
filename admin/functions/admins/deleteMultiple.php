<?php
include_once("../connect.php");

if (!empty($_POST['selected_ids'])) {
    $ids = $_POST['selected_ids'];
    $ids = array_map('intval', $ids);
    $idsList = implode(',', $ids);

    $delete = "DELETE FROM admins WHERE id IN ($idsList)";
    $conn->query($delete);

    header(header: "Location: ../../admins.php"); 
    exit;
} else {
    header(header: "Location: ../../admins.php"); }
?>
