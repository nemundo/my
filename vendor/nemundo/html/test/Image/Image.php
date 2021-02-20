<?php


require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Image Example';

$image = new \Nemundo\Html\Image\Img($html);
$image->src = 'http://cdn3.spiegel.de/images/image-1396662-860_poster_16x9-bvuu-1396662.jpg';
$image->alt = 'Moldau';
$image->width = 100;
$image->height = 100;


$html->render();