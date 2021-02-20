<?php

require '../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Title Example';

$h1 = new \Nemundo\Html\Heading\H1($html);
$h1->content = 'H1';

$h2 = new \Nemundo\Html\Heading\H2($html);
$h2->content = 'H2';

$h3 = new \Nemundo\Html\Heading\H3($html);
$h3->content = 'H3';

$html->render();