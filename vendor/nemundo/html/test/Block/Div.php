<?php


require '../../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Div Example';

$div = new \Nemundo\Html\Block\Div($html);

$div = new \Nemundo\Html\Block\ContentDiv($html);
$div->content = 'hello world';





$html->render();