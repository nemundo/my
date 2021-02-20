<?php

require __DIR__ . '/../config.php';


$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 100;
foreach ($loop->getData() as $number) {

    $type = new \Nemundo\Content\App\UserProfile\Content\UserProfile\UserProfileContentType();
    $type->lastName = 'Muster ' . $number;
    $type->firstName = 'Hans';
    $type->email = 'hans.muser' . $number . '@test.com';
    $type->saveType();

}


