<?php
echo '<h2>Live:' . $this->currentCode . '</h2>';
$codeNo = json_encode($this->currentCode);
?>
<body onload="init()">
    <div id="area" class="chart"> </div>
    <?php echo '<a href="../../live/close/' . $this->currentCode . '"><input type="button" class="buttonContBig" value="Beenden"></input></a>'; ?>
    <script>
        var codeNo = <?php echo $codeNo; ?>;
        var counter = 0;
        var results = [];
        function init() {
            setInterval(refreshValues, 500);
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
            wWidth = window.innerWidth;
            $('#area').empty();
            var questionID = 0;
            var base = 50;
            var rate;
            for (i = 0; i < results.length; i++){
                if(questionID !== results[i].questionID){
                    if (questionID !== 0){
                        $('#area').append('</table>');
                    }
                    questionID = results[i].questionID;
                    $('#area').append('</br><h3>Frage: ' + results[i]['questionText'] + '</h3><table>');
                }
                if (results[i].clicks > 0){
                    rate = wWidth / base *  results[i].clicks;
                } else {
                    rate = 0;
                }
                $('#area').append('<tr><td class="tdResults" style="width:20vw">' + results[i].answerText + '<td class="tdResults"><div style=" width: '  + rate + 'px;">' + results[i].clicks + '</div></td></tr>');
                
            } 
            $('#area').append('</table>');
        }
    </script>
</body>
