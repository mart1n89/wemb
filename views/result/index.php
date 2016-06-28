<h1>Ergebnisse</h1>
<?php     
    echo '<table class="tdConf">';
    foreach ($this->allResults as $key => $value) {
        echo '<tr>';
        echo '<td>' . utf8_encode($value['topicName']). '</td>';
        echo '<td>' . utf8_encode($value['end']). '</td>';
        echo '<td>' . '<a href="result/show/'. $value['sessionID'] .'">Ergebnis</a>' . '</td>';
        echo '</tr>';
    }
    echo '</table>';
?>  
