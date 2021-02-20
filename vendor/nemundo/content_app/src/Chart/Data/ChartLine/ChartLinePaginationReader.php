<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLinePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new ChartLineRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}