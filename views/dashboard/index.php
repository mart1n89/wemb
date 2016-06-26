<h2>Dashboard</h2>
<?php if (Session::get('loggedIn') == true): ?>
    <!--    <a class="buttonContBig" href="live">Live</a></br></br>
        <a class="buttonContBig" href="result">Ergebnisse</a>-->
    <?php
    echo '<h3>Live</h3>';
    if (sizeof($this->currentLive) == 0) {
        echo 'Es sind derzeit keine Sitzungen aktiv.<hr/>';
    } else {
        echo '<table class="tdConf">';
        foreach ($this->currentLive as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['topicName'] . '</td>';
            echo '<td>' . $value['codeNo'] . '</td>';
            echo '<td>' . '<a href="live/show/' . $value['codeNo'] . '">Live</a>' . '</td>';
            echo '<td>' . '<a href="live/close/' . $value['codeNo'] . '">Beenden</a>' . '</td>';
            echo '</tr>';
        }
        echo '</table><hr/>';
    }
    ?>
    <?php
    echo '<h3>Ergebnisse</h3>';
    echo '<table class="tdConf">';
    foreach ($this->allResults as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['topicName'] . '</td>';
        echo '<td>' . $value['end'] . '</td>';
        echo '<td>' . '<a href="result/show/' . $value['sessionID'] . '">Ergebnis</a>' . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<a class="buttonContBig" href="result">Ergebnisse</a>';
    ?> 
<?php endif; ?> 