<?php

namespace Nemundo\User\Script\AdminUser;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\User\Type\UserItemType;

class AdminUserDelete extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'admin-user-delete';
    }


    public function run()
    {

        $user = new UserItemType();
        $user->fromLogin('admin');
        $user->deleteUser();

    }

}