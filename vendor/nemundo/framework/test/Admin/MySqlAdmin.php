<?php

require '../config.php';

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$admin=new \Nemundo\Admin\MySql\Com\MySqlAdmin($html);

$html->render();
