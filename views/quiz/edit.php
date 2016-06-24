<h1>Quiz anpassen</h1>
<?php
$topic = json_encode($this->quiz);
?>
<div id="area"> </div>
<div id="save" style="margin-left:4.5vw"> </div>
<script>
    var jsTopic = <?php echo $topic; ?>;
    var questionList = [];
    var _questionID;
    var questionNo;
    var topicID;
    var checkedButtons = [];
    for (i = 0; i < jsTopic.length; i++) {
        if (jsTopic[i].topicID !== topicID) {
            topicID = jsTopic[i].topicID;
            //console.log(jsTopic[i].topicName);
            $('#area').append('<label>Thema:</label><input type="text" id="topic" value="' + jsTopic[i].topicName + '">');
            $('#area').append('<input class="buttonAdd" type="button" onclick="addQuestion()" value="">');
            $('#save').append('<input class="buttonContBig" type="button" onclick="editTopic()" value="Save">');
            
        }
        if (jsTopic[i].questionID !== _questionID) {
            _questionID = jsTopic[i].questionID;
            //console.log(jsTopic[i].questionText);
            questionNo = addQuestionWithValue(jsTopic[i].questionText);
        }
        //console.log(jsTopic[i].answerText);
        addAnswerWithValue(questionNo, jsTopic[i].answerText, jsTopic[i].isCorrect);
        //console.log(jsTopic[i].isCorrect);
    }
    
    checkButtons();


    function addQuestionWithValue(questionText) {
        var answerList = [];
        var questionCount = getQuestionListLength() + 1;
        var questionNo = 'question_' + questionCount;
        questionList[questionNo] = answerList;
        var questionNo_TXT = questionNo + '_TXT';
        var length = questionList['length'];
        length++;
        questionList['length'] = length;
        $('#area').append('<div id="' + questionNo + '"></div>');
        $('#' + questionNo).append('<label>Frage:</label><input type="text" id="\'' + questionNo_TXT + '\'" value="' + questionText + '">');
        $('#' + questionNo).append('<input class="buttonDelete" type="button" onclick="removeQuestion(\'' + questionNo + '\')" value="">');
        $('#' + questionNo).append('<input class="buttonAdd" type="button" onclick="addAnswer(\'' + questionNo + '\')" value=""></br>');

        return questionNo;
    }

    function addAnswerWithValue(questionNo, answerText, isCorrect) {
        var answerList = questionList[questionNo];
        var length = answerList['length'];
        length++;
        answerList['length'] = length;
        var answerCount = answerList.length + 1;
        var answerNo = 'answer_' + answerCount;
        var answerNo_TXT = questionNo + answerNo + '_TXT';
        var answerNo_RB = questionNo + answerNo + '_RB';
        answerList[answerNo] = questionNo + answerNo + '_TXT';
        questionList[questionNo] = answerList;
        $('#' + questionNo).append('<div id="' + questionNo + answerNo + '"></div>');
        $('#' + questionNo + answerNo).append('<label>Antwort:</label><input type="text" id="\'' + answerNo_TXT + '\'" value="' + answerText + '" >');
        $('#' + questionNo + answerNo).append('<input type="radio" name="\'' + questionNo + '\'" id="\'' + answerNo_RB + '\'" checked>');
        if (isCorrect === '1'){
            checkedButtons[answerNo_RB] = 0;
        }
        $('#' + questionNo + answerNo).append('<input class="buttonDelete" type="button" onclick="removeAnswer(\'' + questionNo + '\' \ , \ \'' + answerNo + '\')" value=""></br>');
        
    }
    
    function checkButtons(){
        for (var k in checkedButtons){
            document.getElementById('\'' + k + '\'').checked = true;
        }
    }

    function editTopic() {
        alertCounter = 0;
        var questions = [];
        //var questionCount = 0;
        var topic = document.getElementById('topic').value;
        if (topic === '') {
            alertCounter++;
            document.getElementById('topic').style.borderColor = "red";
        } else {
            document.getElementById('topic').style.borderColor = "black";
        }
        for (var k in questionList) {
            var answers = [];
            var answerList = questionList[k];
            questionID = k + '_TXT';
            var question = document.getElementById('\'' + questionID + '\'').value;
            if (question === '' || question.indexOf("[") !== -1 || question.indexOf("]") !== -1) {
                alertCounter++;
                document.getElementById('\'' + questionID + '\'').style.borderColor = "red";
            } else {
                document.getElementById('\'' + questionID + '\'').style.borderColor = "black";
            }
            for (var t in answerList) {
                answerID = answerList[t];
                var answer = document.getElementById('\'' + answerID + '\'').value;
                var radioID = k + t + '_RB';
                var cb = document.getElementById('\'' + radioID + '\'').checked;
                if (answer === '' || answer.indexOf(";") !== -1 || answer.indexOf("/") !== -1) {
                    alertCounter++;
                    document.getElementById('\'' + answerID + '\'').style.borderColor = "red";
                } else {
                    document.getElementById('\'' + answerID + '\'').style.borderColor = "black";
                }
                var full_answer = answer + '/' + cb;
                answers.push(full_answer);
            }
            questions[question] = answers;
        }
        if (alertCounter === 0) {
            var data = '';
            for (var k in questions) {
                data += k + '[';
                var answers = questions[k];
                for (var i = 0; i < answers.length; i++) {
                    data += answers[i] + ';';
                    //alert(answers[i]);
                }
                data += ']';
            }
            decodeURIComponent(data);
            $.post('../xhrEditQuiz', {'topic': topic, 'data': data, 'topicID' : topicID});
            $('#area').empty();
            $('#save').empty();
            //$('#area').append('<h2>Erfolgreich ge&auml;ndert.</h2>');
        }
    }
</script>

