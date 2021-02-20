<?php

namespace Nemundo\Content\App\Job\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerReader;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerUpdate;
use Nemundo\Content\App\Log\Content\LogMessage\LogMessageContentType;

class JobScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->active = true;
        $this->minute = 1;

        $this->consoleScript = true;
        $this->scriptName = 'job-run';


    }

    public function run()
    {

        $reader = new JobSchedulerReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        $reader->filter->andEqual($reader->model->done, false);
        foreach ($reader->getData() as $schedulerRow) {

            /** @var AbstractJobContentType $job */
            $job = $schedulerRow->content->getContentType();
            $job->run();

            $update = new JobSchedulerUpdate();
            $update->done = true;
            $update->updateById($schedulerRow->id);

            /*$log = new LogMessageContentType();
            $log->message = $job->getSubject();
            $log->saveType();*/

        }

    }

}