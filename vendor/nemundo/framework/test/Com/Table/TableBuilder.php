<?php

require '../../config.php';


//\Nemundo\Core\Language\LanguageConfig::$currentLanguageCode = \Nemundo\Core\Language\LanguageCode::EN;
\Nemundo\Core\Language\LanguageConfig::$currentLanguageCode = \Nemundo\Core\Language\LanguageCode::DE;


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'TableBuilder Example';


$table = new \Nemundo\Com\TableBuilder\TableBuilder($html);
$table->border = 1;

$header = new \Nemundo\Com\TableBuilder\TableHeader($table);
$header->addText('Title1');
$header->addText('Title2');

$row = new \Nemundo\Com\TableBuilder\TableRow($table);
$row->addText('text1');
$row->addText('text2');

$row = new \Nemundo\Com\TableBuilder\TableRow($table);
$row->addText('text1');

$text = [];
$text[\Nemundo\Core\Language\LanguageCode::DE] = 'Deutsch';
$text[\Nemundo\Core\Language\LanguageCode::EN] = 'English';
$row->addText($text);


$html->render();






