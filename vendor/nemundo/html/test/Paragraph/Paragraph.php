<?php

require '../config.php';

$p = new \Nemundo\Html\Paragraph\Paragraph();
$p->content = 'hello world';
(new \Nemundo\Core\Debug\Debug())->write($p->getBodyContent());
