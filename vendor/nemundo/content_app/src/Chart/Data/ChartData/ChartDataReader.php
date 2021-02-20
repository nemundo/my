<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ChartDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartDataModel();
}
/**
* @return ChartDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return ChartDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ChartDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ChartDataRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}