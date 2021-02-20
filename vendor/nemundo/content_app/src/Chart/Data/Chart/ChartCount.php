<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
class ChartCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartModel();
}
}