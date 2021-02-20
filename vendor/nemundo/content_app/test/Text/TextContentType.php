<?php

require __DIR__ . '/../config.php';

$type = new \Nemundo\Content\App\Text\Content\Text\TextContentType();
$type->text = 'hello world';
$type->saveType();

