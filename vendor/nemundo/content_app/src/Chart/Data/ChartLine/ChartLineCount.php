<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLineCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ChartLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartLineModel();
}
}