<?php

require '../../config.php';

$document = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

$input = new BootstrapTextBox($document);
$input->name = 'copy1';

$btn=new AdminCopyButton($document);
$btn->copyId=$input->name;

$document->render();
