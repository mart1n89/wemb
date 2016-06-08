<?php
    $session = $this->session;
    
//    echo '<pre>';
//    print_r($session);
//    echo '</pre>';
    
        if ($session['isActive'] == 0) {
            echo "Tut uns Leid: Die Sitzung ist nicht aktiv!";
        }
        else {
            $this->controller->requireTopic($session['topicID']);
            $topic = $this->topic;
            $this->controller->requireQuestionSet($session['topicID']);
            $questions = $this->questions;
            
//            echo "<pre>";
//            print_r($questions);
//            echo "</pre>";
            
            echo "<h2>Thema: " . $topic['topicName'] . "<br />" ." Start: " . $session['start'] . "</h2>";
            echo "<form method=\"post\" action=\"<?php echo URL; ?>vote/send\">";
            
            foreach ($questions as $key => $value){
                echo "<div id =\"question_" . $key ."\">";
                echo "<h3>" . utf8_encode($value['questionText']) . "asas</h3>";
                echo "</div>";
            }
            
            echo "</form>";

        }       
?>

<!--<h2>Quiz</h2>
<form method="post" action="<?php echo URL; ?>vote/send">
    <div id ="question1">
        <h3>Sind wir ein cooles Team?</h3>
            <table border="0">       
                <tr>
                    <td>
                        <label>Antwort 1</label>
                        <input type="radio" name="question1"/>
                    </td>
                <tr>
                    <td>
                        <label>Antwort 2</label>
                        <input type="radio" name="question1"/>
                    </td>
                <tr>
                    <td>
                        <label>Antwort 3</label>
                        <input type="radio" name="question1"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Antwort 4</label>
                        <input type="radio" name="question1"/>
                    </td>
                </tr>
            </table>
    </div>

    <div id ="question2">
        <h3>Sind wir ein cooles Team?</h3>
    </div>
    <div id ="question3">
        <h3>Sind wir ein cooles Team?</h3>
    </div>

    <table>
        <tr>
            <td align="left">
                <input type="submit" value="Speichern" class="buttonCont"/>
            </td>
        </tr>
    </table>
    
</form>-->
