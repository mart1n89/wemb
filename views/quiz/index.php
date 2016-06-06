<h1>Quizübersicht</h1>
<table>
    <?php
        foreach ($this->topicList as $key => $value){
           
        echo '<tr>';
        echo '<td>'.$value['topicName'].'</td>';
        echo '<td><a class="buttonCont" href="#">Start</a></td>';
        echo '<td><a class="buttonCont" href="'.URL.'quiz/edit/'.$value['topicID'].'">Edit</a></td>';
        echo '<td><a class="buttonCont" href="'.URL.'quiz/delete/'.$value['topicID'].'">Delete</a></td>';
        echo '</tr>';            
        }
        echo '<tr width="100%">';
        echo '<td colspan="4" align="right"><a class="buttonCont" href="'.URL.'quiz/create">Create</a></td>';
        echo '</tr>';
    ?>
</table>