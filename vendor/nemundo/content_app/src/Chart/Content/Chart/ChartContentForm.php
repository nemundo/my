<?php

namespace Nemundo\Content\App\Chart\Content\Chart;

use Nemundo\Content\App\Chart\Data\Chart\ChartModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class ChartContentForm extends AbstractContentForm
{
    /**
     * @var ChartContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $chart;

    public function getContent()
    {

        $model = new ChartModel();

        $this->chart = new BootstrapTextBox($this);
        $this->chart->label = $model->chart->label;
        $this->chart->validation=true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $this->chart->value = $this->contentType->getDataRow()->chart;

    }


    public function onSubmit()
    {

        $this->contentType->chart = $this->chart->getValue();
        $this->contentType->saveType();

    }

}