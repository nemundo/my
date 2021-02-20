<?php

require '../../config.php';




// DayEvent

$vcalendar = new \Nemundo\Office\Outlook\Vcalendar();
$vcalendar->dateFrom = (new \Nemundo\Core\Type\DateTime\DateTime('2019-08-10 20:00'));
//$vcalendar->dateTo = (new \Nemundo\Core\Type\DateTime\DateTime('2019-08-10 23:00'));
$vcalendar->label = 'Meeting2';
$vcalendar->description = 'Bla bla bla';
$vcalendar->location = 'Sitzungszimmer';
//$vcalendar->dayEvent = true;
$vcalendar->render();




