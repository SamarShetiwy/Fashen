<?php
include("functions/connect.php");

$id = $_GET["id"];
$selectProduct = "SELECT * FROM products WHERE id = $id";
$query = $conn->query($selectProduct);
$product = $query->fetch_assoc();
?> 

<form method="post" action="functions/products/update.php" enctype="multipart/form-data" style="padding: 20px ;">
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
        <input name="img[]" type="file" class="form-control" multiple onchange="previewImages(this)">
        <div id="image-container" style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px;">
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <?php
                $product_id = $product['id']; 
                $imgQuery = $conn->query("SELECT * FROM images WHERE product_id = $product_id");
                foreach ($imgQuery as $img) {
                    echo '<div style="position: relative;">
                            <img src="/Creativeo/Fashen/admin/images/' . $img['name'] . '" style="width: 80px; height: 80px; object-fit: cover; border: 1px solid #ccc; padding: 3px;">
                            <a href="functions/products/delete_img.php?id=' . $img['id'] . '&product_id=' . $product_id . '" 
                            style=" position: absolute;  border-radius: 50%; top: 0; right: 0; background: red; color: white; width: 20px; height: 20px; text-align: center; line-height: 20px; text-decoration: none;">×</a>
                        </div>';
                }
                ?>
            </div>
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


<script>
function previewImages(input) {
    const container = document.getElementById('image-container');

    const files = input.files;
    for (let i = 0; i < files.length; i++) {
        const file = files[i];

        const reader = new FileReader();
        reader.onload = function (e) {
            const imgWrapper = document.createElement('div');
            imgWrapper.style.position = 'relative';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '80px';
            img.style.height = '80px';
            img.style.objectFit = 'cover';
            img.style.border = '1px solid #ccc';
            img.style.padding = '3px';

            imgWrapper.appendChild(img);
            container.appendChild(imgWrapper);
        };

        reader.readAsDataURL(file);
    }
}
</script>

