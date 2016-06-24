<?php
echo '<h1>Live:' . $this->currentCode . '</h1>';
$codeNo = json_encode($this->currentCode);
?>
<body onload="init()">
    <div id="area"> </div>
    <script>
        var codeNo = <?php echo $codeNo; ?>;
        var counter = 0;
        var results = [];
        function init() {
            setInterval(refreshValues, 1000);
        }
        function refreshValues() {
            getResults();
        }
        function getResults() {
            $.post('../xhrShow', {'currentCode': codeNo}, function(data){ 
                results = JSON.parse(data);
            });
            buildHtml();
        }
        function buildHtml() {
            $('#area').empty();
            var questionID = 0;
            for (i = 0; i < results.length; i++){
                if(questionID !== results[i].questionID){
                    questionID = results[i].questionID;
                    $('#area').append('<label>Frage: ' + results[i]['questionText'] + ' </label></br>');
                }
                $('#area').append('<label>' + results[i].answerText + ': ' + results[i].clicks + '</br>');
            }
        }
    </script>
</body>
