<?php 
include("../connect.php");

$name   = $_POST["name"];
$price  = $_POST["price"];
$sale = $_POST["sale"];
$description = $_POST["description"];
$category  = $_POST["category"];

// echo "<pre>";
// print_r ($_FILES);

$imgName=$_FILES["img"]["name"];
$tempName=$_FILES["img"]["tmp_name"];


if($_FILES["img"]["error"] ==0){

    $extentions=["jpg","png","jif","jpeg"];
    $ext =pathinfo($imgName ,PATHINFO_EXTENSION);

    if(in_array($ext , $extentions)){

        if($_FILES["img"]["size"] <2000000){

            $newName=md5(uniqid()) ."." . $ext;
            // echo  $newName;
            move_uploaded_file($tempName ,"../../images/$newName");

        }else{
            echo " size error";
            exit();
        }

    }else{
        echo " extention error";
        exit();
    }
}else{
    echo " file not uploaded";
    exit();
}



$insertData = "INSERT INTO products 
(name, price, sale, img, description, cat_id)
VALUES
('$name', '$price', '$sale', '$newName', '$description', '$category')";

$query=$conn->query($insertData);

if ($query) {
    header("Location: ../../products.php");
    exit(); 
} else {
    echo  $conn->error;
}
?>
