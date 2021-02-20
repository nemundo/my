<?php

require '../config.php';

$template = new \Nemundo\Admin\Template\AdminTemplate();

$title = new \Nemundo\Admin\Com\Title\AdminTitle($template);
$title->content = 'Hello World';

$template->render();

