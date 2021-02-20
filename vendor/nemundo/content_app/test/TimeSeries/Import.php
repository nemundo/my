<?php

use Nemundo\Content\App\TimeSeries\Content\TimeSeries\TimeSeriesContentType;
use Nemundo\Core\Csv\Reader\CsvReader;

require __DIR__ . '/../config.php';


$timeSeries = new TimeSeriesContentType();
$timeSeries->timeSeries = 'World Population';
$timeSeries->uniqueName='world_population';
$timeSeries->saveType();

$reader = new CsvReader();
$reader->filename = __DIR__.'/data/WorldPopulation.csv';
foreach ($reader->getData() as $csvRow) {
    $timeSeries->addYearData($csvRow->getValue('year'),'population', $csvRow->getValue('population')/10);
}

exit;



$filename = __DIR__.'/data/daily-min-temperatures.csv';

$timeSeries = new \Nemundo\Content\App\TimeSeries\Content\TimeSeries\TimeSeriesContentType();
$timeSeries->timeSeries = 'Daily Minimum Temperatures';
$timeSeries->uniqueName = 'daily-min-temperatures';
$timeSeries->saveType();


$reader = new \Nemundo\Core\Csv\Reader\CsvReader();
$reader->filename = $filename;
$reader->separator = \Nemundo\Core\Csv\CsvSeperator::COMMA;
foreach ($reader->getData() as $csvRow) {

    $date = (new \Nemundo\Core\Type\DateTime\Date($csvRow->getValue('Date')));
    $value = $csvRow->getValue('Temp');

    $timeSeries->addDayData($date, 'Melbourne', $value);

}


//$timeSeries->saveAverageWeekFromDay();


$timeSeries->saveAverageFromDate();
// saveMaxFromDate





