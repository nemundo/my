<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ChartDataModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->chartId, $this->chartId);
$this->typeValueList->setModelValue($this->model->xValue, $this->xValue);
$this->typeValueList->setModelValue($this->model->yValue, $this->yValue);
$id = parent::save();
return $id;
}
}