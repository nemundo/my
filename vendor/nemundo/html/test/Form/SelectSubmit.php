<?php

require '../config.php';

//(new \Nemundo\Core\Debug\Debug())->write($_POST);

(new \Nemundo\Core\Debug\Debug())->write((new \Nemundo\Core\Http\Request\Post\MultiplePostRequest('select'))->getValueList());


