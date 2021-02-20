<?php

namespace Nemundo\Content\App\Chart\Content\Chart;

use Nemundo\Com\Chart\Data\AbstractChartData;
use Nemundo\Content\App\Chart\Data\Chart\Chart;
use Nemundo\Content\App\Chart\Data\Chart\ChartReader;
use Nemundo\Content\App\Chart\Data\Chart\ChartRow;
use Nemundo\Content\App\Chart\Data\Chart\ChartUpdate;
use Nemundo\Content\App\Chart\Data\ChartData\ChartData;
use Nemundo\Content\App\Chart\Data\ChartLine\ChartLine;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

class ChartContentType extends AbstractTreeContentType
{

    public $chart;

    protected function loadContentType()
    {
        $this->typeLabel = 'Chart';
        $this->typeId = '33afcc8f-9854-42fa-b962-9e058d5e7b5e';
        $this->formClassList[] = ChartContentForm::class;
        $this->viewClassList[]  = ChartContentView::class;
    }

    protected function onCreate()
    {

        $data = new Chart();
        $data->chart = $this->chart;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new ChartUpdate();
        $update->chart = $this->chart;
        $update->updateById($this->dataId);

    }

    protected function onDataRow()
    {
        $this->dataRow = (new ChartReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ChartRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->chart;
    }


    public function addChardData(AbstractChartData $chartData)
    {


    }


    public function addChartLine($label)
    {

        $data = new ChartLine();
        $data->chartId = $this->dataId;
        $data->lineLabel = $label;
        $data->save();


    }


    public function addValue($xValue, $yValue)
    {


        if ($this->dataId == null) {
            //(new Debug())->write('null');
            $this->saveType();

        }

        $data = new ChartData();
        $data->chartId = $this->dataId;
        $data->xValue = $xValue;
        $data->yValue = $yValue;
        $data->save();

        return $this;

    }


}