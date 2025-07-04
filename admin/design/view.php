  <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">Address</th>
                    <th scope="col">gender</th>
                    <th scope="col">priv</th>
                    <th scope="col">setting</th>
                    </tr>
                </thead>
                <tbody>
                    <a  href="?action=add" class="btn btn-primary" >Add User</a>
                    <br>
                    <br>
                    <?php 
                    include("functions/connect.php");
                    $select = "SELECT * FROM users ORDER BY id DESC";
                    $query=$conn->query($select);
                    foreach($query as $user){
                    
                    ?>
                    <tr>
                        <th scope="row"><?=$user["id"]?></th>
                        <td><?=$user["name"]?></td>
                        <td><?=$user["email"]?></td>
                        <td><?=$user["address"]?></td>
                        <td><?= $user["gender"]==1 ?"female" : "male" ?></td>
                        <td><?=$user["priv"]==1 ?"admin" : "user" ?></td>
                        <td>
                            <a href="?action=edit&id=<?=$user["id"]?>" name="Edit" class="btn btn-primary" > Edit </a>
                            <!-- <a href="functions/users/deleteUser.php?id=<?=$user["id"]?>" name="Delete" class="btn btn-danger"> Delete </a> -->
                            <!-- Button trigger modal -->
                            <a href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?=$user["id"]?>">
                                Delete
                            </a>
                                <!-- Modal -->
                                <div class="modal fade" id="<?=$user["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="<?=$user["id"]?>">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure delete <?=$user["name"]?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="functions/users/deleteUser.php?id=<?=$user["id"]?>" name="Delete" class="btn btn-danger"> Confirm </a>
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
