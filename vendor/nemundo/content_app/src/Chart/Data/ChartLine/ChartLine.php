<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLine extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ChartLineModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->chartId, $this->chartId);
$this->typeValueList->setModelValue($this->model->lineLabel, $this->lineLabel);
$id = parent::save();
return $id;
}
}