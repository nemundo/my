<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
class ChartBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ChartModel
*/
protected $model;

/**
* @var string
*/
public $chart;

public function __construct() {
parent::__construct();
$this->model = new ChartModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->chart, $this->chart);
$id = parent::save();
return $id;
}
}