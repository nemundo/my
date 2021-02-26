<?php

use Nemundo\User\Builder\UserBuilder;

require __DIR__.'/../config.php';

(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->emptyDatabase();
(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->createDatabase();

(new \Dev\Install\DevInstall())->install();

(new \Nemundo\Core\Debug\Debug())->write('Start Install');

(new \Dev\Install\DevInstall())->install();

$user = new UserBuilder();
$user->login = 'admin';
$user->email = 'noreply@noreply.com';
$user->createUser();

$user->changePassword('admin');
$user->addAllUsergroup();


//(new \Nemundo\User\Script\AdminUser\AdminUserScript())
//(new \Nemundo\User\Builder\AdminUserBuilder())->createAdminUser();
