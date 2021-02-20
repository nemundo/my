<?php

namespace Nemundo\User\Script\Password;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\User\Type\UserItemType;


// script zum ändern eines user x (cmd input)
class UserPasswordReset extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'user-password-reset';
    }


    public function run()
    {


        $input = new ConsoleInput();
        $input->message = 'Login';
        $input->validation = true;
        $login = $input->getValue();


        $userType = new UserItemType();
        $userType->fromLogin($login);


        $input = new ConsoleInput();
        $input->message = 'Password';
        $input->validation = true;
        $password = $input->getValue();

        $userType->changePassword($password);


        /*
        $delete = new UserDelete();
        $delete->filter->andEqual($delete->model->login, 'admin');
        $delete->delete();*/


        /* $user = new UserBuilderOld();
         $user->login = 'admin';
         $user->addAllUsergroup();
         $user->createUser();

         $pwd = new PasswordChange();
         $pwd->login = 'admin';
         $pwd->password = 'admin';
         $pwd->changePassword();*/

    }

}