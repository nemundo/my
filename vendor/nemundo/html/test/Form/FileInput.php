<?php

require '../config.php';

(new \Nemundo\Core\Debug\Debug())->write($_POST);
(new \Nemundo\Core\Debug\Debug())->write($_FILES);



//$request = new \Nemundo\Core\Http\Request\Get\GetRequest('input1');
//(new \Nemundo\Core\Debug\Debug())->write($request->getValue());

$request = new \Nemundo\Core\Http\Request\Post\PostRequest('input1');
(new \Nemundo\Core\Debug\Debug())->write($request->getValue());


$request = new \Nemundo\Core\Http\Request\File\FileRequest('file');
(new \Nemundo\Core\Debug\Debug())->write($request->filename);




//$request->saveFile('C:/git/schleuniger/tmp/download/file.jpg');
//$request->saveAsUniqueFilename('C:/git/schleuniger/tmp/download/');



/*
$parameter = new \Nemundo\Core\Http\Parameter\PostParameter();
$parameter->parameterName = 'input1';
(new \Nemundo\Core\Debug\Debug())->write($parameter->getValue());
*/


