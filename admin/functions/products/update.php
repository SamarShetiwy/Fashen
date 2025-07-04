<?php
include("../connect.php");

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$sale = $_POST["sale"];
$description = $_POST["description"];
$category = $_POST["category"];

$img = ""; 

if ($_FILES["img"]["error"] == 0) {
    $allowed = ["jpg", "jpeg", "png", "gif"];
    $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

    if (in_array(strtolower($ext), $allowed)) {
        if ($_FILES["img"]["size"] < 2 * 1024 * 1024) {
            $newName = md5(uniqid()) . "." . $ext;
            move_uploaded_file($_FILES["img"]["tmp_name"], "../../images/$newName");
            $img = ", img = '$newName'";
        }
    }
}

$update = "UPDATE products SET
            name = '$name',
            price = '$price',
            sale = '$sale',
            description = '$description',
            cat_id = '$category'
            $img
            WHERE id = $id";

if ($conn->query($update)) {
    header("Location: ../../products.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>
