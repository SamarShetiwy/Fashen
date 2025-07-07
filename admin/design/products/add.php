<?php 

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<form method="post" action="functions/products/add.php" enctype="multipart/form-data" style="padding: 20px ;">

    <div class="form-group">
        <label for="InputName">name</label>
        <input name="name" type="text" class="form-control" id="InputName1" value="<?= $old['name'] ?? '' ?>">
        <?php 
        if (isset($errors['name'])) {
            echo '<small class="text-danger">' . $errors['name'] . '</small>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="InputPrice">price</label>
        <input name="price" type="text" class="form-control" id="InputPrice" value="<?= $old['price'] ?? '' ?>">
        <?php 
        if (isset($errors['price'])) {
            echo '<small class="text-danger">' . $errors['price'] . '</small>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="InputSale">sale</label>
        <input name="sale" type="text" class="form-control" id="InputSale" value="<?= $old['sale'] ?? '' ?>">
        <?php 
        if (isset($errors['sale'])) {
            echo '<small class="text-danger">' . $errors['sale'] . '</small>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="imageInput">img</label>
        <input name="img[]" type="file" class="form-control" id="imageInput" multiple onchange="previewImages(this)">
        <div id="imagePreviewContainer" style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px;"></div>
        <?php
            if (isset($errors['img'])) {
                echo '<small class="text-danger">' . $errors['img'] . '</small>';
            }
        ?>
    </div>

    <div class="form-group">
        <label for="InputAdress">description</label>
        <textarea name="description" class="form-control" id="InputAdress"><?= $old['description'] ?? '' ?></textarea>
        <?php 
        if (isset($errors['description'])) {
            echo '<small class="text-danger">' . $errors['description'] . '</small>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="category">category</label>
        <select name="category" class="form-control" id="category">
            <?php 
            include_once("functions/connect.php");
            $select = "SELECT * FROM category";
            $query = $conn->query($select);
            foreach($query as $category){
                $selected = (isset($old['category']) && $old['category'] == $category['id']) ? 'selected' : '';
                echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['name'] . '</option>';
            } 
            ?>
        </select>
        <?php 
        if (isset($errors['category'])) {
            echo '<small class="text-danger">' . $errors['category'] . '</small>';
        }
        ?>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<script>
function previewImages(input) {
    const container = document.getElementById('imagePreviewContainer');
    container.innerHTML = "";

    const files = Array.from(input.files);
    files.forEach((file, index) => {
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

            const removeBtn = document.createElement('span');
            removeBtn.innerHTML = '×';
            removeBtn.style.position = 'absolute';
            removeBtn.style.top = '0';
            removeBtn.style.right = '0';
            removeBtn.style.width = '20px';
            removeBtn.style.height = '20px';
            removeBtn.style.background = 'red';
            removeBtn.style.color = '#fff';
            removeBtn.style.borderRadius = '50%';
            removeBtn.style.textAlign = 'center';
            removeBtn.style.cursor = 'pointer';
            removeBtn.style.lineHeight = '20px';
            removeBtn.style.fontSize = '14px';

            removeBtn.onclick = function () {
                files.splice(index, 1); 
                updateFileList(files); 
                previewImages(input);  
            };

            imgWrapper.appendChild(img);
            imgWrapper.appendChild(removeBtn);
            container.appendChild(imgWrapper);
        };

        reader.readAsDataURL(file);
    });

    function updateFileList(newFiles) {
        const dataTransfer = new DataTransfer();
        newFiles.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files;
    }
}
</script>

