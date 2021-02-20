<?php

require '../../config.php';


// Country --> Location
// JsonSite
// addItem(id, value)

// class BootstrapEventButton


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$header = new \Nemundo\Package\Jquery\Container\JqueryHeader();
$html->addHeaderContainer($header);


$listbox = new \Nemundo\Package\Bootstrap\FormElement\BootstrapListBox($html);
$listbox->inputId = 'listbox';

$loader = new \Nemundo\Com\JavaScript\Code\ListBoxJsonLoader();
$loader->url = 'data.json';
$loader->inputId = $listbox->inputId;
$loader->value = '36df5d82-a506-4d3a-9205-f01a865cbc6d';

$html->addJqueryCode($loader);





$btn = new \Nemundo\Admin\Com\Button\AdminEventButton($html);  // new \Nemundo\Package\Bootstrap\Button\BootstrapButton($html);
$btn->content = 'load';
//$btn->clickEvent = $event;
//$btn->id = 'btn1';



$event = new \Nemundo\Package\Jquery\Event\ClickJqueryEvent($btn);
//$event->eventId = $btn->id;
$event->addCodeLine('loadData("b48cf003-a888-42ce-aba7-48abdebc5013");');





//$alert = new \Nemundo\Com\JavaScript\Code\AlertCode($event);
//$alert->message = 'hello world';
//$html->addJqueryCode($event);



$html->render();
