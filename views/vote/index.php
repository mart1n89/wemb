<html>
    
</html>

<h1>Welcome to Vote!</h1>

<?php 

$data = $this->voteList;

echo "<h2>Thema: " . $data[0]['topicName'] . " Start: " . $data[0]['start'] . "</h2>";

foreach ($data as $key => $value){
    echo utf8_encode($data[$key]['questionText']) . " " . utf8_encode($data[$key]['answerText']) . "<br />";
}

?>