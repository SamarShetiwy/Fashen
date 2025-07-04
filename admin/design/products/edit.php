<?php
include("functions/connect.php");

$id = $_GET["id"];
$selectProduct = "SELECT * FROM products WHERE id = $id";
$query = $conn->query($selectProduct);
$product = $query->fetch_assoc();
?> 

<form method="post" action="functions/products/update.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product["id"] ?>">

    <div class="form-group">
        <label>name</label>
        <input name="name" type="text" class="form-control" value="<?= $product["name"] ?>">
    </div>
    <div class="form-group">
        <label>price</label>
        <input name="price" type="text" class="form-control" value="<?= $product["price"] ?>">
    </div>
    <div class="form-group">
        <label>sale</label>
        <input name="sale" type="text" class="form-control" value="<?= $product["sale"] ?>">
    </div>
    <div class="form-group">
        <label>img</label>
        <input name="img" type="file" class="form-control">
        <img src="../../images/<?= $product['img'] ?>" style="width:100px;">
    </div>
    <div class="form-group">
        <label>description</label>
        <textarea name="description" class="form-control"><?= $product["description"] ?></textarea>
    </div>
    <div class="form-group">
        <label>category</label>
        <select name="category" class="form-control">
            <?php 
            $catQuery = $conn->query("SELECT * FROM category");
            foreach($catQuery as $cat){ ?>
                <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $product["cat_id"] ? "selected" : "" ?>>
                    <?= $cat['name'] ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
