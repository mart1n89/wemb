
<?php // $session = $this->session;

if ($session[0]['isActive'] == 1) {
    
}
else {
    echo "Tut uns leid, das Quiz ist nicht mehr aktiv!";
}

    $session = $this->session;
    print_r($session);

    if ($session['isActive'] == 0) {
        echo 'Der eingegebene Code ist nicht aktiv!';
    }
?>

<h2>Quiz</h2>
<form method="post" action="<?php echo URL; ?>vote/send">
    <div id ="question1">
        <h3>Sind wir ein cooles Team?</h3>
            <table border="0">       
                <tr>
                    <td>
                        <label>Antwort 1</label>
                        <input type="radio" name="question1"/>
                    </td>
                <tr>
                    <td>
                        <label>Antwort 2</label>
                        <input type="radio" name="question1"/>
                    </td>
                <tr>
                    <td>
                        <label>Antwort 3</label>
                        <input type="radio" name="question1"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Antwort 4</label>
                        <input type="radio" name="question1"/>
                    </td>
                </tr>
            </table>
    </div>

    <div id ="question2">
        <h3>Sind wir ein cooles Team?</h3>
    </div>
    <div id ="question3">
        <h3>Sind wir ein cooles Team?</h3>
    </div>

    <table>
        <tr>
            <td align="left">
                <input type="submit" value="Speichern" class="buttonCont"/>
            </td>
        </tr>
    </table>
    
</form>
