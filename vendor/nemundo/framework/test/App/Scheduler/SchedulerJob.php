<?php


class TestScheduler extends \Nemundo\App\Scheduler\Job\AbstractScheduler {


    protected function loadScript()
    {

        $this->active = true;
        $this->minute = 1;

    }

    public function run()
    {
        (new \Nemundo\Core\Debug\Debug())->write('Scheduler Job');
    }


}
