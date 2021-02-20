<?php

namespace Nemundo\Content\App\Chart\Content\Chart;

use Nemundo\Com\Chart\Data\LineChartData;
use Nemundo\Content\App\Chart\Data\ChartData\ChartDataReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Echarts\Chart\Echart;

class ChartContentView extends AbstractContentView
{

    /**
     * @var ChartContentType
     */
    public $contentType;

    public function getContent()
    {

        $chart = new Echart($this);

        $line = new LineChartData($chart);

        $reader = new ChartDataReader();
        $reader->filter->andEqual($reader->model->chartId, $this->contentType->getDataId());
        $reader->addOrder($reader->model->id);
        foreach ($reader->getData() as $dataRow) {
            $line->addValue($dataRow->yValue);
            $chart->addXAxisLabel($dataRow->xValue);
        }

        return parent::getContent();

    }

}