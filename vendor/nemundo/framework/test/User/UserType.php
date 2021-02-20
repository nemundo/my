<?php

require __DIR__ . '/../config.php';


$login = 'test@test.com';


$userType = (new \Nemundo\User\Type\UserType())->fromLogin($login);

(new \Nemundo\Core\Debug\Debug())->write($userType->existsUser());
