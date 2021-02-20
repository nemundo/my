<?php

namespace Nemundo\Content\App\Job\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Job\Com\Form\JobForm;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerReader;
use Nemundo\Content\App\Job\Site\JobClearSite;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class JobPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = 'Job Scheduler';

        $btn = new AdminSiteButton($widget);
        $btn->site = JobClearSite::$site;

        $table = new AdminTable($widget);

        $reader = new JobSchedulerReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        $reader->filter->andEqual($reader->model->done, false);

        $header = new TableHeader($table);
        $header->addText('Job');
        $header->addEmpty();

        foreach ($reader->getData() as $schedulerRow) {

            $row = new TableRow($table);
            $row->addText($schedulerRow->content->subject);
            $row->addYesNo($schedulerRow->done);

        }


        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Job';

        new JobForm($widget);

        return parent::getContent();

    }

}