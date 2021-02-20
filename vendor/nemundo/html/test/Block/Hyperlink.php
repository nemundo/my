<?php


require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Hyperlink Example';

$hyperlink = new \Nemundo\Html\Hyperlink\Hyperlink($html);
$hyperlink->content = 'Spiegel';
$hyperlink->href = 'https://www.spiegel.de';
$hyperlink->target = \Nemundo\Html\Hyperlink\HyperlinkTarget::BLANK;

$hyperlink = new \Nemundo\Html\Hyperlink\Hyperlink($html);
//$hyperlink->content = 'Spiegel';
$hyperlink->href = 'https://www.spiegel.de';
$hyperlink->target = \Nemundo\Html\Hyperlink\HyperlinkTarget::BLANK;

$img = new \Nemundo\Html\Image\Img($hyperlink);
$img->src = 'http://www.spiegel.de/static/sys/v12/logo/favicon/touch-icon-iphone.png';



$html->render();