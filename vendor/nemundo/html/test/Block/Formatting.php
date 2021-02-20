<?php


require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Formatting Example';

$small = new \Nemundo\Html\Formatting\Small($html);
$small->content = 'Small';

$bold = new \Nemundo\Html\Formatting\Bold($html);
$bold->content = 'Bold';

$italic = new \Nemundo\Html\Formatting\Italic($html);
$italic->content = 'Italic';

$strong = new \Nemundo\Html\Formatting\Strong($html);
$strong->content = 'Strong';

$sup = new \Nemundo\Html\Formatting\Sup($html);
$sup->content = 'Sup';

$underline = new \Nemundo\Html\Formatting\Underline($html);
$underline->content = 'Underline';

$strike = new \Nemundo\Html\Formatting\Strike($html);
$strike->content = 'Strike';

$html->render();