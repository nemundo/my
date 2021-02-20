<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLineReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ChartLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ChartLineModel();
}
/**
* @return ChartLineRow[]
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
* @return ChartLineRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ChartLineRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ChartLineRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}