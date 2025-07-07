<?php
session_start(); 
include("../connect.php");

$name        = $_POST["name"];
$price       = $_POST["price"];
$sale        = $_POST["sale"];
$description = $_POST["description"];
$category    = $_POST["category"];
$images      = $_FILES["img"];
$extension     = ["jpg", "jpeg", "png", "gif"];

$errors = [];
$old = $_POST;


if (empty($name))        $errors['name'] = "الاسم مطلوب";
if (empty($price))       $errors['price'] = "السعر مطلوب";
if (empty($sale))        $errors['sale'] = "قيمة الخصم مطلوبة";
if (empty($description)) $errors['description'] = "الوصف مطلوب";
if (empty($category))    $errors['category'] = "يرجى اختيار تصنيف";
if (empty($images['name'][0])) $errors['img'] = "يجب رفع صورة واحدة على الأقل";

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header("Location: ../../products.php?action=add");
    exit();
}


$insertProduct = "INSERT INTO products (name, price, sale, description, cat_id)
                    VALUES
                    ('$name', '$price', '$sale', '$description', '$category')";
$conn->query($insertProduct);
$product_id = $conn->insert_id;

foreach ($images["name"] as $index => $imgName) {
    if ($images["error"][$index] === 0) {
        $ext = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        if (!in_array($ext, $extension)) continue;
        if ($images["size"][$index] > 2 * 1024 * 1024) continue;

        $newName = md5(uniqid()) . "." . $ext;
        move_uploaded_file($images["tmp_name"][$index], "../../images/$newName");

        $conn->query("INSERT INTO images (name, product_id) VALUES ('$newName', $product_id)");
    }
}

header("Location: ../../products.php");
exit();
?>
