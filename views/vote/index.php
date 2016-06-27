<?php

    $session = $this->session;
    
    if ($session['isActive'] == 0) {
        echo "<h3>Tut uns Leid: Die Sitzung ist nicht aktiv!</h3>";
    }

    elseif ($session['isActive'] != 0 && $this->controller->checkSessionAnswered($session['sessionID'])) {
        
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
        echo "<form method=\"post\" action=\"" . URL  . "vote/send/" . $session['sessionID'] . "\">";
        echo "<input type=\"hidden\" name=\"sessionID\" value=\"" . $session['sessionID'] ."\">";

        foreach ($questions as $key => $value){
            echo '<div id =\"question_" . $key ."\">';
            echo "<h3>" . utf8_encode($value['questionText']) . "</h3>";
            echo '<table style="margin-left:4.5vw" border="1">';

                foreach ($answers as $innerKey => $innerValue) {
                    if ($value['questionID'] == $innerValue['questionID']) {
                        echo "<tr>";
                        echo '<td>' . "<input style=\"width:auto\" type=\"radio\" value=\"" . $innerValue['answerID'] .  "\" name=\"" . $innerValue['questionID'] . "\" required/>" . '</td>';    
                        echo "<td>" . utf8_encode($innerValue['answerText']) . "</td>";
                            
                        echo "</tr>";   
                    }
                }
            echo "</table>";
            echo "</div>";
        }

        echo "<div id=\"textBlock\"><br/><input type=\"submit\" value=\"Absenden\" class=\"buttonContBig\"/></div>";
        echo "</form>";
    } 
    
    else {
        echo "<h3>Sie haben das Quiz bereits beantwortet...</h3>";
    }       
?>