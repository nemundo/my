<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ChartDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartDataModel();
}
}