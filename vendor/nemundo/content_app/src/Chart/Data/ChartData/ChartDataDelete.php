<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ChartDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartDataModel();
}
}