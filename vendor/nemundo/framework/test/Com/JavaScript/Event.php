<?php

require '../../config.php';

//(new \Nemundo\Core\Debug\Debug())->write((new \Nemundo\Html\Block\Br())->getHtml());


$html = new \Nemundo\Html\Document\HtmlDocument();


//new \Nemundo\Package\Jquery\Container\JqueryHeader()


$btn = new \Nemundo\Html\Button\Button($html);
$btn->label = 'ok';
$btn->id = 'btn';



//$container = new \Nemundo\Com\JavaScript\Container\JavaScriptContainer();
//$html->addHeaderContainer($container);


$script = new \Nemundo\Html\Script\JavaScript();
$html->addHeaderContainer($script);


//$code =new \Nemundo\Com\JavaScript\Command\AlertCode($script);
//$code->message = 'hello';


$function = new \Nemundo\Com\JavaScript\Code\JavaScriptFunction($script);
$function->functionName = 'hello';
$function->addCodeLine('alert("function123123123");');



/*
$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 100;
foreach ($loop->getData() as $number) {
$code = new \Nemundo\Com\JavaScript\Command\DocumentWriteCode($script);
$code->message = 'hoi du '.$number.(new \Nemundo\Html\Block\Br())->getHtml();
}*/


//$container->addCode($code);




/*
$event = new \Nemundo\Com\JavaScript\Event\ClickEvent($container);
$event->eventId = $btn->id;
$event->addCodeLine('alert("click event");');*/


//$script->addCode($event);*/






$script = new \Nemundo\Html\Script\JavaScript($html);
$script->addCodeLine('hello();');



$html->render();
