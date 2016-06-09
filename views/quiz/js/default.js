var questionList = [];
function init(){
    $('#area').append('<label>Thema:</label><input type="text" id="topic">');
    $('#area').append('<input type="button" onclick="addQuestion()" value="add Question">');
    $('#area').append('<input type="button" onclick="saveTopic()" value="Save">');
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
    $('#area').append('<div id="' + questionNo + '"></div>');
    $('#' + questionNo).append('<label>Frage:</label><input type="text" id="\'' + questionNo_TXT + '\'">');
    $('#' + questionNo).append('<input type="button" onclick="removeQuestion(\'' + questionNo + '\')" value="delete">');
    $('#' + questionNo).append('<input type="button" onclick="addAnswer(\'' + questionNo + '\')" value="add answer"></br>');
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
    $('#' + questionNo + answerNo).append('<label>Antwort:</label><input type="text" id="\'' + answerNo_TXT + '\'">');
    $('#' + questionNo + answerNo).append('<input type="radio" name="\'' + questionNo + '\'" id="\'' + answerNo_RB + '\'" checked>');
    $('#' + questionNo + answerNo).append('<input type="button" onclick="removeAnswer(\'' + questionNo + '\' \ , \ \'' + answerNo + '\')" value="delete"></br>');
}

function removeAnswer(questionNo, answerNo){
    //$('#' + questionNo + answerNo).remove();
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
    //alert(topic);
    for (var k in questionList) {
        var answers = [];
        var answerList = questionList[k];
        questionID = k + '_TXT';
        var question = document.getElementById('\'' + questionID + '\'').value;
        if(question === '' || question.indexOf("[") !== -1 || question.indexOf("]") !== -1){
            alertCounter++;
            document.getElementById('\'' + questionID + '\'').style.borderColor="red";
        }
        else{
            document.getElementById('\'' + questionID + '\'').style.borderColor="black";
        }
        //alert(question);
        for (var t in answerList) {  
            answerID = answerList[t];
            var answer = document.getElementById('\'' + answerID + '\'').value;
            var radioID = k + t + '_RB';
            //alert(radioID);
            var cb = document.getElementById('\'' + radioID +'\'').checked;
            //alert(cb);
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
        //questions[question] = answers;
        questions[question] = answers;
        //questionCount++;
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
        //alert(data);
        $.post('xhrAddQuiz', {'topic': topic ,'data' : data});
//        $.ajax({
//            type: "POST",
//            url: 'xhrAddQuiz',
//            data: {'topic': topic ,'data' : data}
//        });
        //window.location.href = "http://wemdb/quiz/index";
    }
}