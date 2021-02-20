<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
class ChartPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartModel();
}
/**
* @return ChartRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ChartRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}