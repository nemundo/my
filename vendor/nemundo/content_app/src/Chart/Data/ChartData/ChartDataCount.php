<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ChartDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartDataModel();
}
}