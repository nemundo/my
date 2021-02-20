<?php

require '../../config.php';




$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$form = new \Nemundo\Com\FormBuilder\SearchForm($html);
$form->formMethod = \Nemundo\Html\Form\FormMethod::GET;

$formRow = new \Nemundo\Package\Bootstrap\Form\BootstrapFormRow($form);

$text = new \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox($form);
$text->label = 'Text';
$text->errorMessage = 'dfasdfasdfasdfsadfasdf';
$text->showErrorMessage = true;


$text->validation=true;
//$text->searchItem=true;
//$text->formMethod = \Nemundo\Html\Form\FormMethod::GET;

new \Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton($formRow);

$p = new \Nemundo\Html\Paragraph\Paragraph($html);
$p->content = 'Value: '. $text->getValue();










//$p = new \Nemundo\Html\Paragraph\Paragraph($html);
//$p->content = 'Value: '. $text->getPostValue();



$html->render();
