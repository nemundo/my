<?php

require '../../vendor/autoload.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Table Example';

$table = new \Nemundo\Html\Table\Table($html);
$table->border = 1;
$table->width = 500;

$thead = new \Nemundo\Html\Table\Thead($table);

$th = new \Nemundo\Html\Table\Th($thead);
$th->content = 'Row 1';

$th = new \Nemundo\Html\Table\Th($thead);
$th->content = 'Row 2';

$tr = new \Nemundo\Html\Table\Tr($table);

$td = new \Nemundo\Html\Table\Td($tr);
$td->content = 'first';

$td = new \Nemundo\Html\Table\Td($tr);
$td->content = 'second';

$html->render();

