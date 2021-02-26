<?php

namespace Nemundo\Content\App\ImageTimeline\Com\ListBox;

use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ImageTimelineListBox extends BootstrapListBox
{
    public function getContent()
    {
        $this->label = 'Timeline';

        $reader=new ImageTimelineReader();
        $reader->addOrder($reader->model->timeline);
        foreach ($reader->getData() as $timelineRow) {

            $this->addItem($timelineRow->id,$timelineRow->timeline);

        }


        return parent::getContent();
    }
}