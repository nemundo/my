<?php

require __DIR__.'/../config.php';


$watch = new \Nemundo\Core\Time\Stopwatch();
(new \Nemundo\Core\System\Delay())->delay(1);

$watch->stopAndPrintOutput();

$stopwatch = new \Nemundo\App\Performance\PerformanceStopwatch('test1');
(new \Nemundo\Core\System\Delay())->delay(1);
$stopwatch->stopStopwatch();
(new \Nemundo\Core\System\Delay())->delay(3);
$stopwatch->writeToScreen();


