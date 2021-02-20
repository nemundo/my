<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TeamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamModel();
}
/**
* @return TeamRow[]
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
* @return TeamRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TeamRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TeamRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}