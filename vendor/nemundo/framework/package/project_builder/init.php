<?php

require 'config.php';

use Nemundo\User\Builder\UserBuilder;

require __DIR__.'/../config.php';

(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->emptyDatabase();
(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->createDatabase();


(new \Nemundo\Core\Debug\Debug())->write('Start Install');



$user = new UserBuilder();
$user->login = 'admin';
$user->email = 'noreply@noreply.com';
$user->createUser();

$user->changePassword('admin');
$user->addAllUsergroup();
