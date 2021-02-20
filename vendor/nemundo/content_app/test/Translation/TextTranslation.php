<?php

require __DIR__ . '/../config.php';


$type=new \Nemundo\Content\App\Translation\Content\TranslationText\TranslationTextContentType();
$type->text['en']='Hello';
$type->text['de'] = 'Hallo';
$type->saveType();


