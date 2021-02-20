<?php


require '../../../config.php';

$document = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();


//new \Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList()



$list=new \Nemundo\Package\Bootstrap\Listing\BootstrapList($document);
$list->addText('One');
$list->addText('One',10);
$list->addText('One',20);


/*
<li class="list-group-item d-flex justify-content-between align-items-center">
A second list item
<span class="badge bg-primary rounded-pill">2</span>
  </li>
*/


//$list=new BootstrapL



$document->render();



//<span class="badge bg-primary rounded-pill">2</span>