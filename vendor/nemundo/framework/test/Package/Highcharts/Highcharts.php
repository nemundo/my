<?php

require '../../config.php';


$html = new \Nemundo\Com\Html\Document\HtmlDocument();

$highcharts = new \Nemundo\Package\Highcharts\Highcharts($html);

$highcharts->addCategory('A');
$highcharts->addCategory('B');
$highcharts->addCategory('C');

$data = new \Nemundo\Package\Highcharts\HighchartsData($highcharts);
$data->addValue(2);
$data->addValue(3);
$data->addValue(4);

$html->render();
