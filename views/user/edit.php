<h1>User: Edit</h1>
<form method="post" action="<?php echo URL; ?>userSave/edit/<?php echo $this->user['userID']; ?>">
    <label>Username</label><input type="text" name="userName" value="<?php echo $this->user['userName'] ?>"/></br>
    <label>Password</label><input type="text" name="password" value="<?php echo $this->user['password'] ?>"/></br>
    <label>Role</label>
    <select name="role">
        <option value="default">Default</option>
        <option value="admin">Admin</option>
    </select></br>
    <label>&nbsp;</label><input type="submit" /></br>
</form>