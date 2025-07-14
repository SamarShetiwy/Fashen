
<?php 


?>

<form method="post" action="functions/admins/addAdmin.php">
    <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputAdress">Address</label>
        <input name="address" type="text" class="form-control" id="exampleInputAdress" placeholder="Address">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" class="form-control" id="gender">
            <option value="0">male</option>
            <option value="1">female</option>
        </select>
    </div>
    <div class="form-check">
        <input class="form-check-input position-static" type="radio" name="priv" id="owner" value="1">
        <label for="owner">owner</label>
    </div>
    <div class="form-check">
        <input class="form-check-input position-static" type="radio" name="priv" id="Admin" value="2">
        <label for="Admin">Admin</label>
    </div>
    <div class="form-check">
        <input class="form-check-input position-static" type="radio" name="priv" id="user" value="3">
        <label for="user">user</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
