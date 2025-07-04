<form method="post" action="functions/products/add.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputName1">name</label>
        <input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">price</label>
        <input name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">sale</label>
        <input name="sale" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputAdress">img</label>
        <input name="img" type="file" class="form-control" id="exampleInputAdress" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputAdress">description</label>
        <textarea name="description" type="text" class="form-control" id="exampleInputAdress" placeholder=""></textarea>
    </div>
    <div class="form-group">
        <label for="category">category</label>
        <select name="category" class="form-control" id="category">
            <?php 
            include("functions/connect.php");
            $select = "SELECT * FROM category";
            $query = $conn->query($select);
            foreach($query as $category){
            ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php 
            } 
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
