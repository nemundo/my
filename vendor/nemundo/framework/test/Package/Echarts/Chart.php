<?php

require '../../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();


$chart = new \Nemundo\Package\Echarts\Chart\Echart($html);

$data = new \Nemundo\Content\App\Chart\Data\ChartLine\ChartLine($chart);
$data->addValue(10);
$data->addValue(20);
$data->addValue(30);


/*
$data = new \Nemundo\Package\Echarts\Data\ChartData($chart);
$data->addValue(10);
$data->addValue(20);
$data->addValue(30);*/


$html->render();

