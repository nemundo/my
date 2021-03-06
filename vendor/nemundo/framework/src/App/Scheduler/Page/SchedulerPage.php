<?php


namespace Nemundo\App\Scheduler\Page;


use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\App\Scheduler\Com\Table\SchedulerTable;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class SchedulerPage extends SchedulerTemplate
{

    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->value = $application->getValue();
        $application->column = true;
        $application->columnSize = 2;

        $table = new SchedulerTable($this);
        $table->applicationId = $application->getValue();

        return parent::getContent();
        
    }

}