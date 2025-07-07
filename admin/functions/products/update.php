<?php
include("../connect.php");

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$sale = $_POST["sale"];
$description = $_POST["description"];
$category = $_POST["category"];

$images = $_FILES["img"];
$extensions = ["jpg", "jpeg", "png", "gif"];

foreach ($images["name"] as $index => $imgName) {
    if ($images["error"][$index] === 0) {
        $ext = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        if (!in_array($ext, $extensions)) continue;
        if ($images["size"][$index] > 2 * 1024 * 1024) continue;
        $newName = md5(uniqid()) . "." . $ext;
        move_uploaded_file($images["tmp_name"][$index], "../../images/$newName");
        $conn->query("INSERT INTO images (name, product_id) VALUES ('$newName', $id)");
    }
}

$update = "UPDATE products SET
            name = '$name',
            price = '$price',
            sale = '$sale',
            description = '$description',
            cat_id = '$category'
            WHERE id = $id";

if ($conn->query($update)) {
    header("Location: ../../products.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>
