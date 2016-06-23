<?php
echo '<h1>Live:' . $this->currentCode . '</h1>';
$codeNo = json_encode($this->currentCode);
?>
<body onload="init()">
    <!--<div id="area">--> 
    <canvas id="canvasId"></canvas>
    <!--</div>-->
    <script type="text/javascript">
        var codeNo = <?php echo $codeNo; ?>;
        //    var counter = 0;

        function init() {
            setInterval(refreshValues, 500);
        }

        function refreshValues() {
            getResults();

        }

        function getResults() {
            buildHtml();
        }

        function buildHtml() {
            
//            var cxt = document.getElementById("canvasId").getContext("2d");
//            var graph = new BarGraph(cxt);
//            graph.margin = 2;
//            graph.width = 450;
//            graph.height = 150;
//            graph.xAxisLabelArr = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
//            graph.update([3, 5, 3, 4, 4, 13, 2]);
//            $('#area').empty();
//            $('#area').append('<label>' + counter + '</label>');
//            counter++;
        }
    </script>
