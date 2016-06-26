<h2>Dashboard</h2>
<?php if (Session::get('loggedIn') == true): ?>
    <!--    <a class="buttonContBig" href="live">Live</a></br></br>
        <a class="buttonContBig" href="result">Ergebnisse</a>-->
    <?php
    echo '<h3>Live</h3>';
    if (sizeof($this->currentLive) == 0) {
        echo '<div id="textBlock">Es sind derzeit keine Sitzungen aktiv.</div><hr/>';
    } else {
        echo '<table class="tdConf">';
        echo '<thead>';
        echo '<th>Thema</th>';
        echo '<th>Code</th>';
        echo '<th>Live</th>';
        echo '<th>Beenden</th>';
        echo '</thead>';
        foreach ($this->currentLive as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['topicName'] . '</td>';
            echo '<td>' . $value['codeNo'] . '</td>';
            echo '<td>' . '<a href="live/show/' . $value['codeNo'] . '"><input type="button" class="buttonLive"></center></a>' . '</td>';
            echo '<td>' . '<a href="live/close/' . $value['codeNo'] . '"><center><input type="button" class="buttonStop"></center></a>' . '</td>';
            echo '</tr>';
        }
        echo '</table><hr/>';
    }
    ?>
    <?php
    echo '<h3>Ergebnisse</h3>';
    echo '<table class="tdConf">';
    echo '<thead>';
    echo '<th>Thema</th>';
    echo '<th>Datum</th>';
    echo '<th>Ergebnisse</th>';
    echo '</thead>';
    foreach ($this->allResults as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['topicName'] . '</td>';
        echo '<td>' . $value['end'] . '</td>';
        echo '<td>' . '<a href="result/show/' . $value['sessionID'] . '"><center><input type="button" class="buttonResults"></center></a>' . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<a class="buttonContBig" style="margin-left:4.5vw; margin-top:1vh;" href="result">Archiv</a>';
    ?> 
<?php endif; ?> 
