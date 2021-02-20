<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLineValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ChartLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartLineModel();
}
}