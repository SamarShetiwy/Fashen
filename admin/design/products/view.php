<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">sale</th>
        <th scope="col">img</th>
        <th scope="col">description</th>
        <th scope="col">category</th>
        <th scope="col">controls</th>
        </tr>
    </thead>
    <tbody>
        <a  href="?action=add" class="btn btn-primary" >Add product</a>
        <br>
        <br>
        <?php 
        include("functions/connect.php");
        $select = "SELECT * FROM products ORDER BY id DESC";
        $query=$conn->query($select);
        foreach($query as $product){
        
        ?>
        <tr>
            <th scope="row"><?=$product["id"]?></th>
            <td><?=$product["name"]?></td>
            <td><?=$product["price"]?></td>
            <td><?=$product["sale"]?></td>
            <td><img style="size: 100px;" src="images/<?=$product['img']?>"></td>
            <td><?=$product["description"]?></td>
            <td>
                <?php
                $cat_id = $product["cat_id"];
                $selectCat = "SELECT name FROM category WHERE id = $cat_id";
                $queryCat = $conn->query($selectCat);
                $category = $queryCat->fetch_assoc();
                ?>
            <?= $category["name"] ?></td>

            <td>
                <a href="?action=edit&id=<?=$product["id"]?>" name="Edit" class="btn btn-primary" > Edit </a>
                <!-- Button trigger modal -->
                <a href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?=$product["id"]?>">
                    Delete
                </a>
                    <!-- Modal -->
                    <div class="modal fade" id="<?=$product["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="<?=$product["id"]?>">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure delete <?=$product["name"]?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="functions/products/delete.php?id=<?=$product["id"]?>" name="Delete" class="btn btn-danger"> Confirm </a>
                            </div>
                            </div>
                        </div>
                        </div>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
