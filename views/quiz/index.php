<h1>Quizübersicht</h1>
<table>
    <?php 
        foreach ($this->topicList as $key => $value){
            echo '<tr>';
            echo '<td>'.$value['topicName'].'</td>';
            echo '<td><a href="#">Start</a></td>';
            echo '<td><a href="'.URL.'quiz/edit/'.$value['topicID'].'">Edit</a></td>';
            echo '<td><a href="'.URL.'quiz/delete/'.$value['topicID'].'">Delete</a></td>';
            echo '</tr>';
        }
        echo '<td><a href="'.URL.'quiz/create">Create</a></td>';
        echo '</tr>';
    ?>
</table>

