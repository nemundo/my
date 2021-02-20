<?php

namespace Nemundo\Content\App\TimeSeries\Content\Widget;

use Nemundo\Content\App\TimeSeries\Com\Chart\TimeSeriesChart;
use Nemundo\Content\View\AbstractContentView;

class TimeSeriesWidgetContentView extends AbstractContentView
{
    /**
     * @var TimeSeriesWidgetContentType
     */
    public $contentType;

    public function getContent()
    {

        $timeSeriesChartRow = $this->contentType->getDataRow();

        $chart = new TimeSeriesChart($this);
        $chart->timeSeriesId = $timeSeriesChartRow->timeSeriesId;
        $chart->periodTypeId = $timeSeriesChartRow->periodTypeId;
        $chart->dateFrom = $timeSeriesChartRow->dateFrom;
        $chart->dateTo = $timeSeriesChartRow->dateTo;
        $chart->addLineId($timeSeriesChartRow->lineId);

        return parent::getContent();

    }

}