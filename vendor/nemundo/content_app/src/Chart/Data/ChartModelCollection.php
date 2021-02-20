<?php
namespace Nemundo\Content\App\Chart\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ChartModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Chart\Data\Chart\ChartModel());
$this->addModel(new \Nemundo\Content\App\Chart\Data\ChartData\ChartDataModel());
$this->addModel(new \Nemundo\Content\App\Chart\Data\ChartLine\ChartLineModel());
}
}