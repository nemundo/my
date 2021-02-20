<?php


namespace Nemundo\Content\Index\Group\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Index\Group\User\UserContentType;
use Nemundo\User\Data\User\UserReader;

class GroupUpdateScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName='group-update';
    }

    public function run()
    {


        $reader=new UserReader();
        foreach ($reader->getData() as $userRow) {


            $type=new UserContentType($userRow->id);
            $type->saveType();

            $type->addUser($userRow->id);



        }




        // TODO: Implement run() method.
    }

}