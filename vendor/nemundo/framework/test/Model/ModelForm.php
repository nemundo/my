<?php

require '../config.php';


$model = new \Nemundo\Admin\AppDesigner\Data\App\AppModel();  // new \Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModel();

$setup = new \Nemundo\Model\Setup\ModelSetup();
$setup->model = $model;
$setup->createTable();



$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

//new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelForm($html);

$form = new \Nemundo\Package\Bootstrap\Form\BootstrapModelForm($html);
$form->model = $model;


//$form = new \Nemundo\Model\Form\ModelForm($html);
//$form->model = new \Schleuniger\App\Kvp\Data\Kvp\KvpModel();


$html->render();

