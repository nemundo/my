<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
class ChartValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartModel();
}
}