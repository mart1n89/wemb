<?php
$questionID = 0;
foreach ($this->results as $key => $value) {
    if ($value['questionID'] !== $questionID) {
        $questionID = $value['questionID'];
        echo 'Frage: ' . $value['questionText'].'</br>';
    }
    echo $value['answerText']. ' ' . $value['clicks'].'</br>';
}
