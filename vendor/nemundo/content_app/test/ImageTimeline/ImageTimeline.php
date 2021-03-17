<?php

require __DIR__ . '/../config.php';

$imageUrl = 'http://cam.tep.ch/Bilder/Start-Sued-Zoom.jpg';

$type=new \Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType();
$type->timeline='Webcam Test';
$type->imageUrl = $imageUrl;
$type->saveType();
