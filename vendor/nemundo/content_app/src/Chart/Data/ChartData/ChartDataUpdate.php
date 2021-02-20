<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
use Nemundo\Model\Data\AbstractModelUpdate;
class ChartDataUpdate extends AbstractModelUpdate {
/**
* @var ChartDataModel
*/
public $model;

/**
* @var string
*/
public $chartId;

/**
* @var string
*/
public $xValue;

/**
* @var int
*/
public $yValue;

public function __construct() {
parent::__construct();
$this->model = new ChartDataModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->chartId, $this->chartId);
$this->typeValueList->setModelValue($this->model->xValue, $this->xValue);
$this->typeValueList->setModelValue($this->model->yValue, $this->yValue);
parent::update();
}
}