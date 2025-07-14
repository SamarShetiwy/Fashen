
<?php

include_once("functions/connect.php");

$id=$_GET["id"];
$selectAdmins="SELECT * FROM admins WHERE id =$id ";
$query=$conn->query("$selectAdmins");
foreach( $query as $admin){

?>


<form method="post" action="functions/admins/updateAdmin.php?id=<?=$admin["id"]?>">
    <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input name="name" type="text" value="<?=$admin["name"]?>" class="form-control" id="exampleInputName1" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="email" value="<?=$admin["email"]?>"  class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" value="<?=$admin["password"]?>" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputAdress">Address</label>
        <input name="address"  value="<?=$admin["address"]?>" type="text" class="form-control" id="exampleInputAdress" placeholder="Address">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" class="form-control" id="gender">
            <option value="0" <?= $admin["gender"] ==0 ? "selected" :""?>>male</option>
            <option value="1" <?= $admin["gender"] ==1 ? "selected" :""?>>female</option>
        </select>
    </div>
    <div class="form-check">
        <input class="form-check-input position-static" type="radio" name="priv" id="owner" value="1" <?= $admin["priv_id"] == "1" ? "checked" : "" ?>>
        <label for="owner">Owner</label>
    </div>
    <div class="form-check">
        <input class="form-check-input position-static" type="radio" name="priv" id="admin" value="2" <?= $admin["priv_id"] == "2" ? "checked" : "" ?>>
        <label for="admin">Admin</label>
    </div>
    <div class="form-check">
        <input class="form-check-input position-static" type="radio" name="priv" id="user" value="3" <?= $admin["priv_id"] == "3" ? "checked" : "" ?>>
        <label for="user">User</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php }

?>

