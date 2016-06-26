<h1>Quiz&uuml;bersicht</h1>
    <?php
        echo '<table border="0" class="tdConf">';
        echo '<thead>';
        echo '<th>Thema</th>';
        echo '<th>Starten</th>';
        echo '<th>Bearbeiten</th>';
        echo '<th>L&ouml;schen</th>';
        echo '</thead>';
            foreach ($this->topicList as $key => $value)
                {           
                    echo '<tr>';
                    echo '<td>'.$value['topicName'].'</td>';
                    echo '<td><a href="'.URL.'quiz/start/'.$value['topicID'].'"><center><input type="button" class="buttonPlay"></center></a></td>';
                    echo '<td><a href="'.URL.'quiz/edit/'.$value['topicID'].'"><center><input type="button" class="buttonEdit"></center></a></td>';
                    echo '<td><a href="'.URL.'quiz/delete/'.$value['topicID'].'"><center><input type="button" class="buttonDelete"></center></a></td>';
                    echo '</tr>';
                }
        echo '</table>';        
        echo '<tr>';
        echo '<a class="buttonContBig" style="margin-left:4.5vw; margin-top:1vh;" href="'.URL.'quiz/create">Erstellen</a>';
        echo '</tr>';
    ?>
