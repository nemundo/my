<?php

require '../../config.php';


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();  // new \Nemundo\Html\Document\HtmlDocument();


$url = 'https://cdn.prod.www.spiegel.de/images/013105f5-06bd-4293-9191-a6feb38d02d4_w948_r2.11_fpx33.6_fpy44.98.jpg';



$fancybox=new Nemundo\Package\Fancybox\FancyboxHyperlink($html);
$fancybox->imageUrl=$url;

$img = new \Nemundo\Html\Image\Img($fancybox);
$img->src=$url;


$html->render();
