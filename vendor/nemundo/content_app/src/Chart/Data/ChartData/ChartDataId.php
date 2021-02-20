<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
use Nemundo\Model\Id\AbstractModelIdValue;
class ChartDataId extends AbstractModelIdValue {
/**
* @var ChartDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartDataModel();
}
}