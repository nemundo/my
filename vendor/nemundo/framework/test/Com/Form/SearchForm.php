<?php

require '../../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();

$form = new \Nemundo\Com\FormBuilder\SearchForm($html);

$input = new \Nemundo\Html\Form\Input\TextInput($form);
$input->name = 'input';

$submit = new \Nemundo\Html\Form\Input\SubmitInput($form);


$html->render();



