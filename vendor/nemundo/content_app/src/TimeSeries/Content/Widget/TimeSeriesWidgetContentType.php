<?php

namespace Nemundo\Content\App\TimeSeries\Content\Widget;

use Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart\TimeSeriesChart;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart\TimeSeriesChartReader;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart\TimeSeriesChartRow;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget\TimeSeriesWidget;

use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Type\DateTime\Date;

class TimeSeriesWidgetContentType extends AbstractContentType
{

    public $timeSeriesId;

    public $lineId;

    public $periodTypeId;

    /**
     * @var Date
     */
    public $dateFrom;

    /**
     * @var Date
     */
    public $dateTo;


    protected function loadContentType()
    {
        $this->typeLabel = 'Time Series Chart';
        $this->typeId = 'ce18fa0a-b35e-49a8-93e6-3c01b6ac39ca';
        $this->formClassList[] = TimeSeriesWidgetContentForm::class;
        $this->viewClassList[] = TimeSeriesWidgetContentView::class;
    }

    protected function onCreate()
    {

        $data= new TimeSeriesChart();  // new TimeSeriesWidget();
        $data->timeSeriesId=$this->timeSeriesId;
        $data->lineId=$this->lineId;
        $data->periodTypeId=$this->periodTypeId;
        $data->dateFrom=$this->dateFrom;
        $data->dateTo=$this->dateTo;
        $this->dataId=$data->save();

    }

    protected function onUpdate()
    {

    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
        $reader = new TimeSeriesChartReader();
        $reader->model->loadTimeSeries();
        $this->dataRow=  $reader->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|TimeSeriesChartRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        $subject=$this->getDataRow()->timeSeries->timeSeries;
        return $subject;

    }

}