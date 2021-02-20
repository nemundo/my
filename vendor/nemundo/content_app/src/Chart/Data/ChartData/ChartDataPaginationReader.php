<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new ChartDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}