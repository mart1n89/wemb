<?php 
    if(null != Session::get('dbError')) { echo '<b>Datenbankverbindung fehlgeschlagen:</b> </br>' . Session::get('dbError'); } 
?>
<h2>Anmelden</h2>
<form action="login/run" method="post">
    <table style="vertical-align: middle;" border="0">
        <tr><td><label id="defaultLabel">Benutzername</label><input type="text" name="login" /></br</td></tr>
        <tr><td><label id="defaultLabel">Passwort</label><input type="password" name="password" /></br></td></tr>
        <tr><td><label id="defaultLabel"></label><input type="submit" name="loginBtn" value="Anmelden" class="buttonContBig" style="margin-right:1vw;"/><input type="submit" name="registerBtn" value="Registrieren" class="buttonContBig"/></br></td></tr>
        <tr><td><input type="submit" name="nopassBtn" value="Passwort vergessen" class="submitClass" style="margin-left: 6em;" /></br></td></tr>
    </table>   
</form>
