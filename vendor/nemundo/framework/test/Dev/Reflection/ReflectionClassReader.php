<?php

require '../../config.php';

$reflectionClassReader = new \Nemundo\Dev\Reflection\ReflectionClassReader();
$reflectionClassReader->project = new \Nemundo\FrameworkProject();

foreach ($reflectionClassReader->getData() as $reflectionClass) {
    (new \Nemundo\Core\Debug\Debug())->write($reflectionClass->className);
}



