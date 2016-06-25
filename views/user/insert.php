<div>
    <h2>Benutzer anlegen</h2>
    <form method="post" action="<?php echo URL; ?>user/create">
            <table border="0" Style="margin-left: 4.5vw">             
                <tr><td><label id="editLabel">Benutzer</label><input type="text" name="userName" required/></br></td></tr>
                <tr><td><label id="editLabel">Nachname</label><input type="text" name="lastName" /></br></td></tr>
                <tr><td><label id="editLabel">Vorname</label><input type="text" name="firstName" /></br></td></tr>
                <tr><td><label id="editLabel">E-Mail</label><input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" /></br></td></tr>
                <tr><td><label id="editLabel">Passwort (6-12 Zeichen)</label><input type="password" name="password" pattern=".{6,12}" required/></br></td></tr>
                <tr><td><label id="editLabel">Timer (Minuten)</label><input type="number" name="defaultTimer" pattern="[0-9]" min="5" value="5" required/></br></td></tr>
                <tr><td><label id="editLabel">Rolle</label>
                     <select font-size="2em" name="role">
                     <option value="default">Standard</option>
                     <option value="admin">Administrator</option>
                     <option value="owner">Besitzer</option></select></br></br></td></tr>
                <tr><td><label></label><input type="submit" value="Speichern" class="buttonContBig"/></td></br>
            </table>
        </form>
</div>

