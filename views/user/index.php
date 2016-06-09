<!--<h2>Test</h2>-->
<div id="wrapper">
    <tr>
        <td><h2>Benutzer bearbeiten</h2></td>
        <td><h2>Benutzer bearbeiten</h2></td>
    </tr> 
    <div id="spalte_eins">
        
        <form method="post" action="<?php echo URL; ?>user/create">
                <table border="1">             
                    <tr><td><label>Username</label><input type="text" name="userName"/></br></td>
                    <tr><td><label>Password</label><input type="text" name="password"/></br></td>
                    <tr><td><label>Role</label>
                         <select font-size="2em" name="role">
                         <option value="default">Default</option>
                         <option value="admin">Admin</option>
                             </select></br></td></tr>
                    <tr><td align="right"><input type="submit" value="Speichern" class="buttonContBig"/></br></td>
                </table>
            </form>
    </div>
    
    <div id="spalte_zwei">
        
        <?php
            echo '<table content-align="right" border="1" class="tableConf">';
                foreach ($this->userList as $key => $value){
                    echo '<tr>';
                    echo '<td font-size="2em">' . $value['userID'] . '</td>';
                    echo '<td>' . $value['userName'] . '</td>';
                    echo '<td>' . $value['role'] . '</td>';
                    echo '<td><a href="#" class="buttonContSmall">Edit</a></td>';
                    echo '<td><a href="#" class="buttonContSmall">Delete</a></td>';
                    echo '</tr>';
                }
                echo '</table>';
            ?>
    </div>
</div>