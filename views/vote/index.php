<?php
    $session = $this->session;
    
        if ($session['isActive'] == 0) {
            echo "Tut uns Leid: Die Sitzung ist nicht aktiv!";
        }
        else {
            
            //Collect All Data
            
            $this->controller->requireTopic($session['topicID']);
            $topic = $this->topic;
            
            $this->controller->requireQuestionSet($session['topicID']);
            $questions = $this->questions;
            
            foreach ($questions as $key => $value) {
                $questionIDs[$key] = $value['questionID'];
            }
            
            $this->controller->requireAnswers($questionIDs);
            $answers = $this->answers;
            
            echo "<h2>Thema: " . $topic['topicName'] . "<br />" ." Start: " . $session['start'] . "</h2>";
            echo "<form method=\"post\" action=\"<?php echo URL; ?>vote/send\">";
            
            foreach ($questions as $key => $value){
                echo "<div id =\"question_" . $key ."\">";
                echo "<h3>" . utf8_encode($value['questionText']) . "</h3>";
                echo "<table>";
                
                    foreach ($answers as $innerKey => $innerValue) {
                        if ($value['questionID'] === $innerValue['questionID']) {
                            echo "<tr>";
                                echo "<td>" . $innerValue['answerText'] . "</td>";
                                echo "<td>" . "<input type=\"radio\" name=\"question_" . $key ."\"/>" . "</td>";
                            echo "</tr>";   
                        }
                    }               
                
                echo "</table>";
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
