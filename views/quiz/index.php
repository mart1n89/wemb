<h1>My Quizzes</h1>
<table>
    <?php 
        foreach ($this->topicList as $key => $value){
            echo '<tr>';
            echo '<td>' . $value['topicName'] . '</td>';
            echo '<td><a href="#">Start</a></td>';
            echo '<td><a href="#">Edit</a></td>';
            echo '<td><a href="#">Delete</a></td>';
            echo '</tr>';
        }
    ?>
</table>

