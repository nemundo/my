<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
class Dashboard extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var DashboardModel
*/
protected $model;

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

public function __construct() {
parent::__construct();
$this->model = new DashboardModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->dashboard, $this->dashboard);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$id = parent::save();
return $id;
}
}