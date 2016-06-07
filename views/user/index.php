<h2>User</h2>

<div id="wrapper">
    <div id="steuerung">
	<table border="1" width="100%">    
                <form method="post" action="<?php echo URL; ?>user/create">
                    
                    <tr><td><label>Username</label><input type="text" name="userName"/></br></td>
                    <tr><td><label>Password</label><input type="text" name="password"/></br></td>
                    <tr><td><label>Role</label>
                        <select name="role">
                            <option value="default">Default</option>
                            <option value="admin">Admin</option>
                            </select></br></td></tr>
                     <tr><td align="right"><input type="submit" value="Speichern" class="buttonCont"/></br></td>
                </form>
            </table>
    </div>
    <div id="zweite_spalte">
	<table border="1">
                <?php 
                    foreach ($this->userList as $key => $value){
                        echo '<tr>';
                        echo '<td>' . $value['userID'] . '</td>';
                        echo '<td>' . $value['userName'] . '</td>';
                        echo '<td>' . $value['role'] . '</td>';
                        echo '<td><a href="#" class="buttonCont">Edit</a></td>';
                        echo '<td><a href="#" class="buttonCont">Delete</a></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
    </div>
</div>