<?php

namespace Nemundo\App\Application\Com\ListBox;

use Nemundo\App\Application\Data\Project\ProjectReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ProjectListBox extends BootstrapListBox
{
    public function getContent()
    {
        $this->label = 'Project';

        $reader=new ProjectReader();
        $reader->addOrder($reader->model->project);
        foreach ($reader->getData() as $projectRow) {
            $this->addItem($projectRow->id,$projectRow->project);
        }


        return parent::getContent();
    }
}