<?php

namespace Nemundo\User\Install;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\User\Application\UserApplication;

class UserClean extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'user-clean';
    }

    public function run()
    {

        (new UserApplication())->reinstallApp();

    }

}