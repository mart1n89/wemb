<?php 
    $code = $this->currentCode;
    if ($code[1] === true){
        echo 'Ihr Quiz wurde bereits gestartet!</br>';
        echo 'Ihr Code lautet: '.$code[0].'</br>';
    }
    else {
        echo 'Ihr Quiz wurde gestartet!</br>';
        echo 'Ihr Code lautet: '.$code[0].'</br>';
    }
    echo '<td ><a href="'.URL.'live/show/'.$code[0].'">Live&nbsp;</a></td>';
    echo '<td ><a href="'.URL.'live/close/'.$code[0].'">Beenden</a></td>';
?>

