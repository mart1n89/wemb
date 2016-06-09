<h1>Quiz&uuml;bersicht</h1>
<table border="0" style="padding-left:5vw;">
    <?php
        foreach ($this->topicList as $key => $value){
           
        echo '<tr>';
        echo '<td class="tdConf">'.$value['topicName'].'</td>';
        echo '<td class="tdConf"><a class="buttonContSmall" href="#">Start</a></td>';
        echo '<td class="tdConf"><a class="buttonContSmall" href="'.URL.'quiz/edit/'.$value['topicID'].'">Edit</a></td>';
        echo '<td class="tdConf"><a class="buttonContSmall" href="'.URL.'quiz/delete/'.$value['topicID'].'">Delete</a></td>';
        echo '</tr>';            
        }
        echo '<tr width="100%">';
        echo '<td colspan="4" align="right" style="padding-top:2vh;"><a class="buttonContBig" href="'.URL.'quiz/create">Create</a></td>';
        echo '</tr>';
    ?>
</table>
