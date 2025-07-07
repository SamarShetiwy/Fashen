<?php
include("../connect.php");

$id = $_GET['id'];
$product_id = $_GET['product_id']; 

$getImg = $conn->query("SELECT name FROM images WHERE id = $id");
$img = $getImg->fetch_assoc();

if ($img) {
    $imgPath = "../../images/" . $img['name'];
    
    if (file_exists($imgPath)) {
        unlink($imgPath);
    }

    $conn->query("DELETE FROM images WHERE id = $id");
}
    header("Location: ../../products.php?action=edit&id=$product_id");
    exit();
?>
