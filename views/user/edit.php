<?php 
    $user = $this->user; 
    echo '<h3>Benutzer: ' . $user['userName'] . '</h3>';
?>

<form method="post" action="<?php echo URL; ?>userSave/edit/<?php echo $user['userID']; ?>">
    <table border="0" Style="margin-left: 4.5vw"> 
        <tr><td><label id="editLabel">Benutzer</label><input type="text" name="userName" value="<?php echo $user['userName']; ?>" /></br></td></tr>
        <tr><td><label id="editLabel">Passwort</label><input type="password" name="password" value="" /></br></td></tr>
        <tr><td><label id="editLabel">Rolle</label>
                <select font-size="2em" name="role">
                    <option value="default">Standard</option>
                    <option value="admin">Administrator</option>
                    <option value="owner">Besitzer</option>
                </select></br></td></tr>
        <tr><td><label></label><input type="submit" value="Speichern" class="buttonContBig"/></td></br>
    </table>
</form>