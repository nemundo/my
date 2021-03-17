<?php

require __DIR__ . '/../config.php';


$login = 'urs';

$userBuilder = new \Nemundo\User\Builder\UserBuilder();
$userBuilder->login = $login;
//$userBuilder->email = $login . '@test.com';
$userId = $userBuilder->createUser();

$userBuilder->addUsergroup(new \Nemundo\App\Application\Usergroup\AppUsergroup());
$userBuilder->changePassword($login);

//$userBuilder->c

//$userType = new \Nemundo\User\Builder\UserBuilder($userId);
//$userType->changePassword($login);
//$userType->addAllUsergroup();



/*
$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $n) {

    $login = 'user' . $n;

    $userBuilder = new \Nemundo\User\Builder\UserBuilder();
    $userBuilder->login = $login;
    $userBuilder->email = $login . '@test.com';
    $userId = $userBuilder->createUser();

    (new \Nemundo\Core\Debug\Debug())->write('UserId: ' . $userId);

    $userType = new \Nemundo\User\Builder\UserBuilder($userId);
    $userType->changePassword($login);
    $userType->addAllUsergroup();

}*/
