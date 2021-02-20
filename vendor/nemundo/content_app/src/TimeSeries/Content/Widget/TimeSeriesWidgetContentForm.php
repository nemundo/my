<?php

namespace Nemundo\Content\App\TimeSeries\Content\Widget;

use Nemundo\Content\App\TimeSeries\Com\ListBox\LineListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\PeriodTypeListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\TimeSeriesListBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;

class TimeSeriesWidgetContentForm extends AbstractContentForm
{
    /**
     * @var TimeSeriesWidgetContentType
     */
    public $contentType;

    /**
     * @var TimeSeriesListBox
     */
    private $timeSeries;

    /**
     * @var LineListBox
     */
    private $line;

    /**
     * @var PeriodTypeListBox
     */
    private $periodType;

    /**
     * @var BootstrapFromToDatePicker
     */
    private $dateFromTo;

    public function getContent()
    {

        $this->timeSeries=new TimeSeriesListBox($this);
        $this->line=new LineListBox($this);
        $this->periodType=new PeriodTypeListBox($this);
        $this->dateFromTo=new BootstrapFromToDatePicker($this);

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $chartRow=$this->contentType->getDataRow();

        $this->timeSeries->value= $chartRow->timeSeriesId;
        $this->line->value= $chartRow->lineId;
        $this->periodType->value=$chartRow->periodTypeId;

      //  $this->dateFromTo->=  new BootstrapFromToDatePicker($this);



    }


    public function onSubmit()
    {

        $this->contentType->timeSeriesId=$this->timeSeries->getValue();
        $this->contentType->lineId=$this->line->getValue();
        $this->contentType->periodTypeId=$this->periodType->getValue();
        $this->contentType->dateFrom=$this->dateFromTo->getDateFrom();
        $this->contentType->dateTo=$this->dateFromTo->getDateTo();
        $this->contentType->saveType();

    }
}