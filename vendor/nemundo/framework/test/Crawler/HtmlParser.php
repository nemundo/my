<?php

require __DIR__.'/../config.php';

//$url = 'http://localhost/app/web/';
$url = 'http://localhost/asfdasdfasdfas';

$htmlParser = new \Nemundo\Crawler\HtmlParser\HtmlParser();
$htmlParser->fromUrl($url);

(new \Nemundo\Core\Debug\Debug())->write($htmlParser->getPageTitle());

