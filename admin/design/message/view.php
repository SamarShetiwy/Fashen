
<form method="POST" action="functions/admins/deleteMultiple.php">
    <button type="submit" class="btn btn-danger mb-2">🗑 Delete </button>
    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">phone</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">Message</th>
                        <th scope="col">view</th>
                        </tr>
                    </thead>
                    <tbody>
                        <a href="?action=add" class="btn btn-primary">Add message</a>
                        <br>
                        <br>
                        <?php
                            include_once"functions/connect.php";
                            $selectMsg="SELECT * FROM message";
                            $query=$conn->query($selectMsg);
                            foreach($query as $message){    
                            ?>
                        <tr>
                            <td><input type="checkbox" id="select"></th>
                            <td><?= $message["id"]?></td>
                            <td><?= $message["name"]?></td>
                            <td><?= $message["phone"]?></td>
                            <td><?= $message["email"]?></td>
                            <td><?= $message["message"]?></td>
                            <td><?= $message["view"] == 1 ? "read" : "unread" ?></td>
                            <td>
                            <button="" type="button" class="btn btn-success viewMsg" data-id="<?=$message["id"]?>" data-toggle="modal" data-target="#viewMsg<?=$message["id"]?>">
                                view message
                            </button>
                            <div class="modal fade " id="viewMsg<?=$message["id"]?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?=$message["id"]?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editMsg<?=$admin["id"]?>">edit </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?= $message["message"]?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                                            <a href="?id=<?=$message["id"]?>" class="btn btn-danger">confirm </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr> 
                            <?php }?> 
                    </tbody>
                </table>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    

    $(".viewMsg").click(function(){
    $(this).parent().prev().text('Read');

    let id = $(this).data('id');
    console.log(id);
    $.post("functions/editMessage.php", { messageId: id }, function(data){
        console.log(data); 
        $('.spanNum').text(data);
    });
});


</script>


