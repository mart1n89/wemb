<?php 
    $user = $this->user; 
    echo '<h3>Benutzer &auml;ndern</h3>';
?>

<form method="post" action="<?php echo URL; ?>user/editSave">
    <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
    <table border="0" Style="margin-left: 4.5vw"> 
        <tr><td><label id="editLabel">Benutzer</label><input type="text" name="userName" value="<?php echo $user['userName']; ?>" required/></br></td></tr>
        <tr><td><label id="editLabel">Passwort</label><input type="password" name="password" value="1234" required/></br></td></tr>
        <tr><td><label id="editLabel">Rolle</label>
                <select font-size="2em" name="role" required <?php if($user['role']=='owner') echo 'disabled="disabled"'; ?>>
                    <option value="default" <?php if($user['role']=='default') echo 'selected="selected"'; ?>>Standard</option>
                    <option value="admin" <?php if($user['role']=='admin') echo 'selected="selected"'; ?>>Administrator</option>
                    <option value="owner" <?php if($user['role']=='owner') echo 'selected="selected"'; ?>>Besitzer</option>
                </select></br></td></tr>
        <tr><td><label></label><input type="submit" value="Speichern" class="buttonContBig"/></td></br>
    </table>
</form>