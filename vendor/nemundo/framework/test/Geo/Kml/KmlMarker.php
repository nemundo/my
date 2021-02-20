<?php

require '../../config.php';


$description = new \Nemundo\Geo\Kml\Property\HtmlDescription();
$description->value = 'hello world';

$description = new \Nemundo\Geo\Kml\Property\Description();
$description->value = '123';


(new \Nemundo\Core\Debug\Debug())->writeHtml($description->getContent());

