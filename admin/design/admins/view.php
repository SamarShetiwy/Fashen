
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
                    <a  href="?action=add" class="btn btn-primary" >Add admin</a>
                    <br>
                    <br>
                    <?php 
                    include_once("functions/connect.php");
                    $select = "SELECT * FROM admins ORDER BY id DESC";
                    $query=$conn->query($select);
                    foreach($query as $admin){
                    
                    ?>
                    <tr>
                        <th scope="row"><?=$admin["id"]?></th>
                        <td><?=$admin["name"]?></td>
                        <td><?=$admin["email"]?></td>
                        <td><?=$admin["address"]?></td>
                        <td><?= $admin["gender"]==1 ?"female" : "male" ?></td>
                        <td>
                            <?php
                                $priv_id =$admin["priv_id"];
                                include_once("functions/connect.php");
                                $selectRole = "SELECT name FROM privliges WHERE id =$priv_id";
                                $queryRole=$conn->query($selectRole);
                                $role= $queryRole->fetch_assoc();
                                echo $role["name"];
                            ?>                        
                        <td>
                            <a href="?action=edit&id=<?=$admin["id"]?>" name="Edit" class="btn btn-primary" > Edit </a>
                            <!-- <a href="functions/admins/deleteAdmin.php?id=<?=$admin["id"]?>" name="Delete" class="btn btn-danger"> Delete </a> -->
                            <!-- Button trigger modal -->
                            <?php 

                            $role= $_SESSION["role"];
                            if ($role == 500): ?>
                            <a href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?=$admin["id"]?>">
                                Delete
                            </a>

                            <!-- Modal -->
                                <div class="modal fade" id="deleteModal<?=$admin["id"]?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?=$admin["id"]?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel<?=$admin["id"]?>">حذف المستخدم</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                هل أنت متأكد من حذف <strong><?=$admin["name"]?></strong>؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                <a href="functions/admins/deleteAdmin.php?id=<?=$admin["id"]?>" class="btn btn-danger">تأكيد الحذف</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <span style="color: gray;">🚫 غير مسموح بالحذف</span>
                            <?php endif; ?>

                        
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
