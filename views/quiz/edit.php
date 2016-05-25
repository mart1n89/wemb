<h1>Quiz anpassen</h1>
<table>
    <?php 
        foreach ($this->getSingleQuiz as $key => $value){
            echo '<tr>';
            echo '<td>'.$value['topicName'].'</td>';
            echo '</tr>';
        }
        echo '<td><a href="'.URL.'quiz/create">Save</a></td>';
        echo '</tr>';
    ?>
</table>