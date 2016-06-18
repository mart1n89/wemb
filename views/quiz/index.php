<h1>Quiz&uuml;bersicht</h1>
    <?php
        echo '<table border="0" class="tdConf">';
        echo '<thead>';
        echo '<th>Thema</th>';
        echo '<th>Starten</th>';
        echo '<th>Bearbeiten</th>';
        echo '<th>Löschen</th>';
        echo '</thead>';
            foreach ($this->topicList as $key => $value)
                {           
                    echo '<tr>';
                    echo '<td >'.$value['topicName'].'</td>';
                    echo '<td ><a class="buttonPlay" href="#"><input type="image" src="public/css/images/play.png" height="25vh" width="auto"></a></td>';
                    echo '<td ><a class="buttonPlay" href="'.URL.'quiz/edit/'.$value['topicID'].'"><input type="image" src="public/css/images/play.png" height="25vh" width="auto"></a></td>';
                    echo '<td ><a class="buttonPlay" href="'.URL.'quiz/delete/'.$value['topicID'].'"><input type="image" src="public/css/images/play.png" height="25vh" width="auto"></a></td>';
                    echo '</tr>';
                }
        echo '</table>';        
        echo '<tr width="100%">';
        echo '<a class="buttonContBig" style="margin-left:4.5vw; margin-top:1vh;" href="'.URL.'quiz/create">Create</a>';
        echo '</tr>';
    ?>
