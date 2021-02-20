<?php


require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Listing Example';


$ul = new \Nemundo\Html\Listing\Ul($html);

$li = new \Nemundo\Html\Listing\Li($ul);
$li->content = 'Li1';

$li = new \Nemundo\Html\Listing\Li($ul);
$li->content = 'Li2';

$ol = new \Nemundo\Html\Listing\OrderedList($html);

$li = new \Nemundo\Html\Listing\Li($ol);
$li->content = 'Li1';

$li = new \Nemundo\Html\Listing\Li($ol);
$li->content = 'Li2';


$html->render();