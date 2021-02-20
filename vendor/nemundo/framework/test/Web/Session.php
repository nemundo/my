<?php

require '../../../../autoload.php';



$session = new \Nemundo\Web\Http\Session\Session();
$session->sessionName = 'test';
$session->getValue();
