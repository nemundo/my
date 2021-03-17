<?php

require __DIR__ . '/../config.php';

$document=new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

(new \Nemundo\Admin\UniqueId\Widget\UniqueIdAdminWidget($document));


$document->render();
