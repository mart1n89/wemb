<?php 
    $code = $this->currentCode;
    if ($code[1] === true){
        echo 'Ihr Quiz wurde bereits gestartet!</br>';
        echo '<label>Ihr Code lautet: </label><b>'.$code[0].'</b></br>';
    }
    else {
        echo 'Ihr Quiz wurde gestartet!</br>';
        echo '<label>Ihr Code lautet: </label><b>'.$code[0].'</b></br>';
    }
    echo '</br>';
    echo '<td ><a href="'.URL.'live/show/'.$code[0].'" class="buttonContBig">Live</a></td><label> </label>';
    echo '<td ><a href="'.URL.'live/close/'.$code[0].'" class="buttonContBig">Beenden</a></td>';
    echo '<div align="center" style="font-size:10em">' .URL. '</div></b>';
    echo '<div align="center" style="font-size:10em">Code:'. $code[0] .'</div>';
?>

