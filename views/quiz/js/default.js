var questionList = [];
function init(){
    $('#area').append('<label id="createLabel">Thema:</label><input class="createInput"  type="text" id="topic">');
    $('#area').append('<input style="padding-top: 0.5vh; margin-right:2vw" class="buttonAddQuest" type="button" onclick="addQuestion()" value=""></br>');
    $('#save').append('<input class="buttonContBig" type="button" onclick="saveTopic()" value="Speichern">');
}

function addQuestion(){
    var answerList = [];
    var questionCount = getQuestionListLength() + 1;
    var questionNo = 'question_' + questionCount;
    questionList[questionNo] = answerList;
    var questionNo_TXT = questionNo + '_TXT';
    var length = questionList['length'];
    length++;
    questionList['length'] = length;
    $('#area').append('<div id="' + questionNo + '" ></div>');
    $('#' + questionNo).append('<label id="createLabel">Frage:</label><input class="createInput" type="text" id="\'' + questionNo_TXT + '\'">');
    $('#' + questionNo).append('<input type="button" style="padding-top:0.5vh; margin-right:2vw" class="buttonDelete" onclick="removeQuestion(\'' + questionNo + '\')" value="">');
    $('#' + questionNo).append('<input type="button" class="buttonAddExcl" onclick="addAnswer(\'' + questionNo + '\')" value=""></br>');
}

function getQuestionListLength(){
    return questionList['length'];
}

function removeQuestion(questionNo){
    for (var k in questionList) {  
        if (k === questionNo) {
            delete questionList[questionNo];
            $('#' + questionNo).remove();
        }
    }
}

function addAnswer(questionNo){
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
    $('#' + questionNo + answerNo).append('<label id="createLabel">Antwort:</label><input class="createInput" type="text" id="\'' + answerNo_TXT + '\'">');
    $('#' + questionNo + answerNo).append('<input style="padding-top:0.5vh" class="buttonDelete" type="button" onclick="removeAnswer(\'' + questionNo + '\' \ , \ \'' + answerNo + '\')" value="">');
    $('#' + questionNo + answerNo).append('<input type="radio" name="\'' + questionNo + '\'" id="\'' + answerNo_RB + '\'" checked></br>');
}

function removeAnswer(questionNo, answerNo){
    var answerList = questionList[questionNo];
    for (var k in answerList) {  
        if (k === answerNo) {
            delete answerList[answerNo];
            $('#' + questionNo + answerNo).remove();
        }
    }
    questionList[questionNo] = answerList;
}

function saveTopic(){
    alertCounter = 0;
    questionCount = 0; 
    var questions = [];
    //var questionCount = 0;
    var topic = document.getElementById('topic').value;
    if(topic === ''){ 
        alertCounter++;
        document.getElementById('topic').style.borderColor="red";
    }
    else{
        document.getElementById('topic').style.borderColor="black";
    }
    for (var k in questionList) {
        questionCount++;
        var answers = [];
        var answerList = questionList[k];
        answerCount = 0;
        questionID = k + '_TXT';
        var question = document.getElementById('\'' + questionID + '\'').value;
        if(question === '' || question.indexOf("[") !== -1 || question.indexOf("]") !== -1){
            alertCounter++;
            document.getElementById('\'' + questionID + '\'').style.borderColor="red";
        }
        else{
            document.getElementById('\'' + questionID + '\'').style.borderColor="black";
        }
        for (var t in answerList) {  
            answerCount++;
            answerID = answerList[t];
            var answer = document.getElementById('\'' + answerID + '\'').value;
            var radioID = k + t + '_RB';
            var cb = document.getElementById('\'' + radioID +'\'').checked;
            if(answer === '' || answer.indexOf(";") !== -1 || answer.indexOf("/") !== -1){
                alertCounter++;
                document.getElementById('\'' + answerID + '\'').style.borderColor="red";
            }
            else{
                document.getElementById('\'' + answerID + '\'').style.borderColor="black";
            }
            var full_answer = answer + '/' + cb;
            answers.push(full_answer);
        }
        if (answerCount < 2){
            alertCounter++;
            alert('Es muessen mindestens 2 Antworten für eine Frage vorhanden sein.');
        }
        questions[question] = answers;   
    }
    if (questionCount === 0){
        alert('Es muss mindestens 1 Frage vorhanden sein.');
        alertCounter++;
    }
    if(alertCounter === 0){
        var data = '';
            for (var k in questions) {
                data += k + '[';
                var answers = questions[k];
                for (var i = 0; i < answers.length; i++){
                    data += answers[i] + ';';
                    //alert(answers[i]);
                }
                data += ']';
            }
        decodeURIComponent(data);
        $.post('xhrAddQuiz', {'topic': topic ,'data' : data});
        $('#area').empty();
        $('#save').empty();
        $('#area').append('<a class="buttonContBig" href="../quiz">Zurueck</a></br>');
    }
    //$('#area').append('<form action="quiz" method="get"><input type="submit" value="Back" name="Submit" id="frm1_submit" /></form>');
}
