<?php


require '../../config.php';


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$html->addHeaderContainer(new \Nemundo\Package\Jquery\Container\JqueryHeader());



$form = new \Nemundo\Package\Bootstrap\Form\BootstrapForm($html);

$radio = new \Nemundo\Package\Bootstrap\FormElement\BootstrapRadioGroup($form);
$radio->addItem(1, 'One');
$radio->addItem(2, 'Two');
$radio->addItem(3, 'Three');





$html->render();





