<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
use Nemundo\Model\Id\AbstractModelIdValue;
class ChartId extends AbstractModelIdValue {
/**
* @var ChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartModel();
}
}