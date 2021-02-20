<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
use Nemundo\Model\Id\AbstractModelIdValue;
class ChartLineId extends AbstractModelIdValue {
/**
* @var ChartLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartLineModel();
}
}