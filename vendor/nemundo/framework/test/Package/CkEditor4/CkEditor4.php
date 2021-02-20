<?php

require '../../config.php';


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();


$ckeditor4 = new \Nemundo\Package\CkEditor4\CkEditor4($html);



$html->render();


