<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLineDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ChartLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartLineModel();
}
}