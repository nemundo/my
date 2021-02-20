<?php

require __DIR__ . '/../../config.php';

$builder = new \Nemundo\App\Apache\Builder\ApacheConfigBuilder();
$builder->serverName = 'test01';
$builder->path = '/path/';

(new \Nemundo\Core\Debug\Debug())->write($builder->getContent());


