<?php

namespace Nemundo\User\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Type\UserItemType;

class AdminUserBuilder extends AbstractBase
{

    public $password = 'admin';

    public function createAdminUser()
    {

        $user = new UserItemType();
        $user->login = 'admin';
        $user->email = 'noreply@noreply.com';
        $user->createUser();

        $user->changePassword($this->password);
        $user->addAllUsergroup();

    }

}