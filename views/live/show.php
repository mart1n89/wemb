<?php
echo '<h1>Live:' . $this->currentCode . '</h1>';
$codeNo = json_encode($this->currentCode);
?>
<body onload="init()">
    <div id="area" class="chart"> </div>
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
            //alert(window.innerWidth);
            $('#area').empty();
            var questionID = 0;
            var base = 100;
            var rate;
            for (i = 0; i < results.length; i++){
                if(questionID !== results[i].questionID){
                    if (questionID !== 0){
                    }
                    questionID = results[i].questionID;
                    $('#area').append('Frage: ' + results[i]['questionText'] + '</br>');
                }
                if (results[i].clicks > 0){
                    rate = base * results[i].clicks;
                } else {
                    rate = 0;
                }
                $('#area').append('<div style="width: '  + rate + 'px;">' + results[i].answerText + ':' + results[i].clicks + '</div>');
            }
        }
    </script>
</body>
