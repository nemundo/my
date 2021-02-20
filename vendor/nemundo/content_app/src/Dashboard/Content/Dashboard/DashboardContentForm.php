<?php

namespace Nemundo\Content\App\Dashboard\Content\Dashboard;

use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class DashboardContentForm extends AbstractContentForm
{
    /**
     * @var DashboardContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $dashboard;

    /**
     * @var BootstrapListBox
     */
    private $columnCount;

    public function getContent()
    {

        $model = new DashboardModel();

        $this->dashboard = new BootstrapTextBox($this);
        $this->dashboard->label = $model->dashboard->label;
        $this->dashboard->validation = true;
        //$this->dashboard->value='test';

        $this->columnCount = new BootstrapListBox($this);
        $this->columnCount->label = 'Column Count';  // $model->columnCount->label;
        $this->columnCount->validation = true;
        $this->columnCount->emptyValueAsDefault=false;

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 5;
        foreach ($loop->getData() as $number) {
            $this->columnCount->addItem($number, $number);
        }

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $dashboardRow=$this->contentType->getDataRow();
        $this->dashboard->value=$dashboardRow->dashboard;

        //$this->columnCount->visible=false;

    }


    public function onSubmit()
    {

        $this->contentType->dashboard = $this->dashboard->getValue();
        $this->contentType->columnCount = $this->columnCount->getValue();
        $this->contentType->saveType();

    }
}