<?php

require __DIR__ . '/../config.php';

$imageUrl = 'https://eumetview.eumetsat.int/static-images/latestImages/EUMETSAT_MSG_H03B_WesternEurope.png';


$content = new \Nemundo\Content\App\Webcam\Content\Webcam\WebcamContent();
$content->webcam = 'Eumetsat Western Europe';
$content->imageUrl = $imageUrl;
$content->saveType();
