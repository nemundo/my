<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
use Nemundo\Model\Data\AbstractModelUpdate;
class ChartUpdate extends AbstractModelUpdate {
/**
* @var ChartModel
*/
public $model;

/**
* @var string
*/
public $chart;

public function __construct() {
parent::__construct();
$this->model = new ChartModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->chart, $this->chart);
parent::update();
}
}