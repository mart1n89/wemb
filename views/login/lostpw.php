<?php
    if (isset($this->msg)) { echo $this->msg;} 
?>

<h2>Passwort vergessen</h2>
<form action="lostpw" method="post">
        <table border="0" Style="margin-left: 4.5vw">             
            <tr><td><label id="editLabel">Benutzer</label><input type="text" name="userName" /></br></td></tr>
            <tr><td><label id="editLabel">E-Mail</label><input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required /></br></td></tr>
            <tr><td><input type="submit" name="registerBtn" value="Passwort anfordern" class="buttonContBig" style="margin-right:1vw;"/></td></tr></br>
        </table>
</form>

