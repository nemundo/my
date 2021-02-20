<?php

require '../../../config.php';

$document = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();
$document->title = 'Bootstrap Example';

$h1 = new \Nemundo\Html\Heading\H1($document);
$h1->content = 'Hello World';

$document->render();