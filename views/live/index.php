<h1>Live</h1>
<?php
if (sizeof($this->currentLive) == 0) {
    echo 'Es sind derzeit keine Sitzungen aktiv.';
} else {
    echo '<table class="tdConf">';
    foreach ($this->currentLive as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['topicName']. '</td>';
        echo '<td>' . $value['codeNo']. '</td>';
        echo '<td>' . '<a href="live/show/'. $value['codeNo'] .'">Live</a>' . '</td>';
        echo '<td>' . '<a href="live/close/'. $value['codeNo'] .'">Beenden</a>' . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>



