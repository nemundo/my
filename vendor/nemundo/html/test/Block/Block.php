<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();


$div = new \Nemundo\Html\Block\Div($html);

new \Nemundo\Html\Block\Hr($html);

new \Nemundo\Html\Block\Br($html);

$html->render();

