<?php

require '../../../config.php';

$document = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$carousel = new \Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel($document);
$carousel->addImage('');
$carousel->addImage('');

$document->render();
