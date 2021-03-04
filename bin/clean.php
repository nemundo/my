<?php

use Nemundo\User\Builder\UserBuilder;

require __DIR__.'/../config.php';

(new \Nemundo\Core\Type\File\File(\Nemundo\Db\DbConfig::$defaultConnection->filename))->deleteFile();


(new \My\Setup\MySetup())->run();


$user = new UserBuilder();
$user->login = 'admin';
$user->email = 'noreply@noreply.com';
$user->createUser();

$user->changePassword('admin');
$user->addAllUsergroup();


//(new \Nemundo\User\Script\AdminUser\AdminUserScript())
//(new \Nemundo\User\Builder\AdminUserBuilder())->createAdminUser();
