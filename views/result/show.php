<h1>Resultat</h1>
<?php
$questionID = 0;
$base = 10;
$topic = 0;
foreach ($this->results as $key => $value) {
    if ($topic === 0){
        echo '<h2>'.$value['topicName'].'</h2>';
        $topic = 1;
    }
    if ($value['questionID'] !== $questionID) {
        if ($questionID != 0){
            echo '</table></div></br>';
        }
        $questionID = $value['questionID'];
        $value['questionText'];
        echo '<h3>Frage: ' . $value['questionText'] .'</h3>';
        echo '<div class="chart"><table>';
    }
    //echo $value['answerText']. ' ' . $value['clicks'].'</br>';
    if ($value['clicks'] > 0){
        $rate = $base * $value['clicks'];
    } else {
        $rate = 0;
    }
    utf8_encode($value['answerText']);
    echo '<tr><td class="tdResults" style="width:20vw">'. $value['answerText']. '</td><td class="tdResults"><div style=" width: ' .$rate. 'px;">' . $value['clicks'] . '</div></td></tr>';
} 
echo '</table></div>';
?>