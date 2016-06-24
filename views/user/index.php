<?php
    if (isset($this->msg)) { echo $this->msg;} 
?>

<div>
    <h2>Benutzerverwaltung</h2>           
        <table>
            <tr>
                <td><h4>Benutzer hinzuf&uuml;gen</h4></td>
                <td>&nbsp;<a href="<?php echo URL ?>user/newuser"><input class="buttonAdd" value="" type="button"></a></td>
            </tr>
        </table>        
    <hr/>    
    <h4>Benutzer bearbeiten</h4>
    <?php
        echo '<table class="tdConf">';
        echo '<thead>';
        //echo '<th>ID</th>';
        echo '<th>Benutzer</th>';
        echo '<th>Rolle</th>';
        echo '<th>Bearbeiten</th>';
        echo '<th>L&ouml;schen</th>';
        echo '</thead>';
            foreach ($this->userList as $key => $value){
                echo '<tr>';
                //echo '<td>' . $value['userID'] . '</td>';
                echo '<td>' . $value['userName'] . '</td>';
                echo '<td>';
                    if($value['role'] == "owner") { echo "Besitzer"; }
                    if($value['role'] == "default") { echo "Standard"; }
                    if($value['role'] == "admin") { echo "Administrator"; }
                echo '</td>';
                echo '<td><a href="' . URL .  'user/edit/' . $value['userID'] . '"><center><input type="button" class="buttonEdit"></center></a></td>';
                echo '<td><a href="' . URL . 'user/delete/' . $value['userID'] . '"><center><input type="button" id="' . $value['userName'] . '" onclick="return confirmDelete(this.id)" class="buttonDelete"></center></a></td>';
                echo '</tr>';
            }
            echo '</table>';
    ?>
</div>
