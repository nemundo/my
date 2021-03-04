<?php

require __DIR__ . '/../config.php';

//$url = 'https://www.blick.ch/wirtschaft/nach-quarantaene-in-st-moritz-badrutt-s-palace-bricht-die-wintersaison-ab-id16313552.html';
$url = 'https://evernote.com/intl/de/';



$parser = new \Nemundo\Crawler\HtmlParser\OpenGraphParser($url);

(new \Nemundo\Core\Debug\Debug())->write('Title: ' . $parser->title);
(new \Nemundo\Core\Debug\Debug())->write('Description: ' . $parser->description);
(new \Nemundo\Core\Debug\Debug())->write('Url: ' . $parser->url);
(new \Nemundo\Core\Debug\Debug())->write('Image Url: ' . $parser->imageUrl);
(new \Nemundo\Core\Debug\Debug())->write('Site Name: ' . $parser->siteName);

(new \Nemundo\Core\Debug\Debug())->write($parser->getPropertyList());

