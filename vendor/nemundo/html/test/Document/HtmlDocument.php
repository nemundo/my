<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Document Example';

/*$title=new \Nemundo\Html\Header\Title($html);
$title->content='Document Example';*/

$h1 = new \Nemundo\Html\Heading\H1($html);
$h1->id = 'id1';
$h1->content = 'Hello World!';

$p = new \Nemundo\Html\Paragraph\Paragraph($html);
$p->content = 'Lorem ..';

$html->render();
