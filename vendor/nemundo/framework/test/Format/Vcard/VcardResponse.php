<?php

require '../../config.php';

$response = new \Nemundo\Format\Vcard\VcardResponse();

$response->firstName = 'Hans';
$response->lastName = 'Muster';
$response->email = 'hans@muster.ch';
$response->sendResponse();
