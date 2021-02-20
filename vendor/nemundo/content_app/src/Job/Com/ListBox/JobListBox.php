<?php

namespace Nemundo\Content\App\Job\Com\ListBox;

use Nemundo\Content\App\Job\Data\Job\JobReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class JobListBox extends BootstrapListBox
{
    public function getContent()
    {

        $this->label = 'Job';

        $reader = new JobReader();
        //$reader->model->loadApplication();
        $reader->addOrder($reader->model->job);
        foreach ($reader->getData() as $jobRow) {
            //$this->addItem($jobRow->id, $jobRow->job . ' (' . $jobRow->application->application . ')');
            $this->addItem($jobRow->id, $jobRow->job);
        }

        return parent::getContent();
    }
}