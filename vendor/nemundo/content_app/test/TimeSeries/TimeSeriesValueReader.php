<?php

require __DIR__ . '/../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();


$table = new \Nemundo\Admin\Com\Table\AdminTable($html);

$header = new \Nemundo\Com\TableBuilder\TableHeader($table);
$header->addText('Period');
$header->addText('Value');


//$uniqueName = 'daily-min-temperatures';
$uniqueName= 'world_population';

$timeSeries = new \Nemundo\Content\App\TimeSeries\Content\TimeSeries\TimeSeriesContentType();
$timeSeries->fromUniqueName($uniqueName);


$reader = new \Nemundo\Content\App\TimeSeries\Reader\TimeSeriesValueReader();
//$reader->timeSeriesId = $timeSeries->getDataId();
$reader->addLineId(506);
$reader->addLineId(507);
//$reader->periodTypeId = (new \Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthPeriodType())->id;
$reader->periodTypeId = (new \Nemundo\Content\App\TimeSeries\Type\PeriodType\YearPeriodType())->id;  // (new \Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthPeriodType())->id;

foreach ($reader->getData() as $item) {
    $row = new \Nemundo\Com\TableBuilder\TableRow($table);
    $row->addText($item->periodText);

    $row->addText($item->value[506]);
    $row->addText($item->value[507]);



}


$html->render();



