<div>
    <h2>Benutzer anlegen</h2>
    <form method="post" action="<?php echo URL; ?>user/create">
            <table border="0">             
                <tr><td><label>Username</label><input type="text" name="userName"/></br></td>
                <tr><td><label>Password</label><input type="text" name="password"/></br></td>
                <tr><td><label>Role</label>
                     <select font-size="2em" name="role">
                     <option value="default">Default</option>
                     <option value="admin">Admin</option>
                         </select></br></td></tr>
                <tr><td><label></label><input type="submit" value="Speichern" class="buttonContBig"/></br></td>
            </table>
        </form>
</div>
</br>

<hr/>   
 
<div>
    <h2>Benutzer bearbeiten</h2>
    <?php
        echo '<table class="tdConf">';
            foreach ($this->userList as $key => $value){
                echo '<tr>';
                echo '<td>' . $value['userID'] . '</td>';
                echo '<td>' . $value['userName'] . '</td>';
                echo '<td>' . $value['role'] . '</td>';
                echo '<td><a href="#" class="buttonContSmall">Edit</a></td>';
                echo '<td><a href="#" class="buttonContSmall">Delete</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        ?>
</div>
