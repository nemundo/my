<?php


namespace Nemundo\Content\App\Task\Install;


use Nemundo\Content\App\Task\Data\TaskIndex\TaskIndexDelete;
use Nemundo\Project\Install\AbstractClean;

class TaskIndexClean extends AbstractClean
{

    public function cleanData()
    {

        (new TaskIndexDelete())->delete();

    }

}