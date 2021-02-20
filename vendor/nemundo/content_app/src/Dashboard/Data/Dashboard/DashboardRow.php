<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
class DashboardRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var DashboardModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $dashboard;

/**
* @var string
*/
public $url;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->dashboard = $this->getModelValue($model->dashboard);
$this->url = $this->getModelValue($model->url);
}
}