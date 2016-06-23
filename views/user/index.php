<div>
    <h2>Benutzer anlegen</h2>
    <form method="post" action="<?php echo URL; ?>user/create">
            <table border="0" Style="margin-left: 4.5vw">             
                <tr><td><label id="editLabel">Benutzername</label><input type="text" name="username" required/></br></td></tr>
                <tr><td><label id="editLabel">Passwort</label><input type="password" name="password" required/></br></td></tr>
                <tr><td><label id="editLabel">Rolle</label>
                     <select font-size="2em" name="role">
                     <option value="default">Standard</option>
                     <option value="admin">Administrator</option>
                     <option value="owner">Besitzer</option></select></br></td></tr>
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
        echo '<th>L&ouml;schen</th>';
        echo '</thead>';
            foreach ($this->userList as $key => $value){
                echo '<tr>';
                echo '<td>' . $value['userID'] . '</td>';
                echo '<td>' . $value['userName'] . '</td>';
                echo '<td>' . $value['role'] . '</td>';
                echo '<td><a href="user/edit/' . $value['userID'] . '"><center><input type="button" class="buttonEdit"></center></a></td>';
                echo '<td><a href="user/delete/' . $value['userID'] . '"><center><input type="button" id="' . $value['userName'] . '" onclick="return confirmDelete(this.id)" class="buttonDelete"></center></a></td>';
                echo '</tr>';
            }
            echo '</table>';
        ?>
</div>
