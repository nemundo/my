<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
class ChartDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartModel();
}
}