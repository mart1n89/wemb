<h1>Resultat</h1>
<?php
$questionID = 0;
$base = 10;
foreach ($this->results as $key => $value) {
    if ($value['questionID'] !== $questionID) {
        if ($questionID != 0)
            echo '</div></br>';
        
        $questionID = $value['questionID'];
        echo 'Frage: ' . $value['questionText'].'</br>';
        echo '<div class="chart">';
    }
    //echo $value['answerText']. ' ' . $value['clicks'].'</br>';
    if ($value['clicks'] > 0){
        $rate = $base * $value['clicks'];
    } else {
        $rate = 0;
    }
    echo '<div style="width: ' .$rate. 'px;">' .$value['answerText'].':'. $value['clicks'] . '</div>';
} 
echo '</div>';
?>