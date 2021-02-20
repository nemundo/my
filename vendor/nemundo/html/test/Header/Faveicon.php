<?php

require '../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();

$fav = new \Nemundo\Html\Header\Favicon($html);


$btn = new \Nemundo\Html\Button\Button($html);
$btn->label = 'Hello';


//$log = new \Nemundo\Com\JavaScript\ConsoleLog($html);
//$log->message = '123123123';

$function = new \Nemundo\Com\JavaScript\Code\JavaScriptFunction($html);
$function->functionName = 'hello';
$function->addCodeLine('console.log("hello");');


/*
$script = new \Nemundo\Html\Script\JavaScript($html);
$script->addCodeLine('hello();');
*/
//$html->addHeaderContainer($fav);



$html->render();
