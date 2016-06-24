<h1>Resultat</h1>
<?php
$questionID = 0;
foreach ($this->results as $key => $value) {
    if ($value['questionID'] !== $questionID) {
        $questionID = $value['questionID'];
        echo 'Frage: ' . $value['questionText'].'</br>';
    }
    echo $value['answerText']. ' ' . $value['clicks'].'</br>';
} ?>
<!--<style>

.chart div {
  font: 10px sans-serif;
  background-color: steelblue;
  text-align: right;
  padding: 3px;
  margin: 1px;
  color: white;
}

</style>
<div class="chart">
  <div style="width: 40px;">4</div>
  <div style="width: 80px;">8</div>
  <div style="width: 150px;">15</div>
  <div style="width: 160px;">16</div>
  <div style="width: 230px;">23</div>
  <div style="width: 420px;">42</div>
</div>-->
