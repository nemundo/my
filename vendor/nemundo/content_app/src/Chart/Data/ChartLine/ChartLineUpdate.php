<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
use Nemundo\Model\Data\AbstractModelUpdate;
class ChartLineUpdate extends AbstractModelUpdate {
/**
* @var ChartLineModel
*/
public $model;

/**
* @var string
*/
public $chartId;

/**
* @var string
*/
public $lineLabel;

public function __construct() {
parent::__construct();
$this->model = new ChartLineModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->chartId, $this->chartId);
$this->typeValueList->setModelValue($this->model->lineLabel, $this->lineLabel);
parent::update();
}
}