
<?php

include("functions/connect.php");

$id=$_GET["id"];
$selectUsers="SELECT * FROM users WHERE id =$id ";
$query=$conn->query("$selectUsers");
foreach( $query as $user){

?>


<form method="post" action="functions/users/updateUser.php?id=<?=$user["id"]?>">
    <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input name="name" type="text" value="<?=$user["name"]?>" class="form-control" id="exampleInputName1" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="email" value="<?=$user["email"]?>"  class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" value="<?=$user["password"]?>" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputAdress">Address</label>
        <input name="address"  value="<?=$user["address"]?>" type="text" class="form-control" id="exampleInputAdress" placeholder="Address">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" class="form-control" id="gender">
            <option value="0" <?= $user["gender"] ==0 ? "selected" :""?>>male</option>
            <option value="1" <?= $user["gender"] ==1 ? "selected" :""?>>female</option>
        </select>
    </div>
    <div class="form-group">
        <input class="form-check-input position-static" type="radio" name="priv" id="admin" value="1" <?= $user["priv"] =="1" ? "checked" :""?>>
        <label for="admin">Admin</label>
    </div>
    <div class="form-group">
        <input class="form-check-input position-static" type="radio" name="priv" id="user" value="0" <?= $user["priv"] =="0" ? "checked" :""?>>
        <label for="user">User</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php }

?>

