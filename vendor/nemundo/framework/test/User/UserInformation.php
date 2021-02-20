<?php

require '../config.php';

$userInformation = new \Nemundo\User\Information\UserInformation();

(new \Nemundo\Core\Debug\Debug())->write('Login: ' . $userInformation->getLogin());
(new \Nemundo\Core\Debug\Debug())->write('Login: ' . $userInformation->getUserId());
