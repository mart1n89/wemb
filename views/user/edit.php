<h1>User: Edit</h1>
<form method="post" action="<?php echo URL; ?>userSave/edit/<?php echo $this->user['userid']; ?>">
    <label>Username</label><input type="text" name="username" value="<?php echo $this->user['username'] ?>"/></br>
    <label>Password</label><input type="text" name="password" value="<?php echo $this->user['password'] ?>"/></br>
    <label>Role</label>
    <select name="role">
        <option value="default">Default</option>
        <option value="admin">Admin</option>
    </select></br>
    <label>&nbsp;</label><input type="submit" /></br>
</form>