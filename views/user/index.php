<div>
    <h2>Benutzer anlegen</h2>
    <form method="post" action="<?php echo URL; ?>user/create">
            <table border="0" Style="margin-left: 4.5vw">             
                <tr><td><label id="editLabel">Username</label><input type="text" name="userName"/></br></td></tr>
                <tr><td><label id="editLabel">Password</label><input type="text" name="password"/></br></td></tr>
                <tr><td><label id="editLabel">Role</label>
                     <select font-size="2em" name="role">
                     <option value="default">Default</option>
                     <option value="admin">Admin</option></select></br></td></tr>
                <tr><td><label></label><input type="submit" value="Speichern" class="buttonContBig"/></td></br>
            </table>
        </form>
</div>
</br>

<hr/>   
 
<div>
    <h2>Benutzer bearbeiten</h2>
    <?php
        echo '<table class="tdConf">';
        echo '<thead>';
        echo '<th>ID</th>';
        echo '<th>Benutzer</th>';
        echo '<th>Rolle</th>';
        echo '<th>Bearbeiten</th>';
        echo '<th>Löschen</th>';
        echo '</thead>';
            foreach ($this->userList as $key => $value){
                echo '<tr>';
                echo '<td>' . $value['userID'] . '</td>';
                echo '<td>' . $value['userName'] . '</td>';
                echo '<td>' . $value['role'] . '</td>';
                echo '<td style="content-align:center"><a href="#"><center><input type="image" src="public/css/images/edit_new.png" height="auto" width="35vw"></center></a></td>';
                echo '<td style="content-align:center"><a href=""><center><input type="image" src="public/css/images/delet.png" height="auto" width="35vw"></center></a></td>';
                echo '</tr>';
            }
            echo '</table>';
        ?>
</div>
