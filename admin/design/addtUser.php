<form method="post" action="functions/users/addUser.php">
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
        <input class="form-check-input position-static" type="checkbox" name="priv" id="admin" value="admin">
        <label for="admin">Admin</label>
    </div>
    <div class="form-check">
        <input class="form-check-input position-static" type="checkbox" name="priv" id="user" value="user">
        <label for="user">User</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
