<?php 
    $user = $this->user; 
    SESSION::set('oldUser', $user['userName']);
    echo '<h2>Benutzer &auml;ndern</h2>';
?>

<form method="post" action="<?php echo URL; ?>user/editSave">
    <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
    <table border="0" Style="margin-left: 4.5vw"> 
        <tr><td><label id="editLabel">Benutzer</label><input type="text" name="userName" value="<?php if(isset($user['userName'])) { echo $user['userName']; } ?>" required/></br></td></tr>
        <tr><td><label id="editLabel">Nachname</label><input type="text" name="lastName" value="<?php if(isset($user['lastName'])) { echo $user['lastName']; } ?>" /></br></td></tr>
        <tr><td><label id="editLabel">Vorname</label><input type="text" name="firstName" value="<?php if(isset($user['firstName'])) { echo $user['firstName']; } ?>" /></br></td></tr>
        <tr><td><label id="editLabel">E-Mail</label><input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php if(isset($user['email'])) { echo $user['email']; } ?>" required /></br></td></tr>
        <tr><td><input type="hidden" name="oldpass" value="<?php if(isset($user['password'])) { echo $user['password']; } ?>" /></td></tr>
        <tr><td><label id="editLabel">Neues Passwort (6-12 Zeichen)</label><input type="password" name="password" pattern=".{6,12}" value="" /></br></td></tr>
        <tr><td><label id="editLabel">Timer (Minuten)</label><input type="number" name="defaultTimer" pattern="[0-9]" min="5" value="<?php if(isset($user['defaultTimer'])) { echo $user['defaultTimer']; } ?>" required/></br></td></tr>
        <tr><td><label id="editLabel">Rolle</label>
                <select font-size="2em" name="role" required <?php if($user['role']=='owner') echo 'disabled="disabled"'; ?>>
                    <option value="default" <?php if($user['role']=='default') echo 'selected="selected"'; ?>>Standard</option>
                    <option value="admin" <?php if($user['role']=='admin') echo 'selected="selected"'; ?>>Administrator</option>
                    <option value="owner" <?php if($user['role']=='owner') echo 'selected="selected"'; ?>>Besitzer</option>
                </select></br></br></td></tr>
        <tr><td><input type="submit" value="Speichern" class="buttonContBig"/></td></tr></br>
    </table>
</form>