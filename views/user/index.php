<h1>User</h1>
<form method="post" action="<?php echo URL; ?>user/create">
    <label>Username</label><input type="text" name="userName" /></br>
    <label>Password</label><input type="text" name="password"/></br>
    <label>Role</label>
    <select name="role">
        <option value="default">Default</option>
        <option value="admin">Admin</option>
    </select></br>
    <label>&nbsp;</label><input type="submit" /></br>
</form>

<table>
<?php 
    foreach ($this->userList as $key => $value){
        echo '<tr>';
        echo '<td>' . $value['userID'] . '</td>';
        echo '<td>' . $value['userName'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        echo '<td><a href="#">Edit</a></td>';
        echo '<td><a href="#">Delete</a></td>';
        echo '</tr>';
    }
?>

</table>