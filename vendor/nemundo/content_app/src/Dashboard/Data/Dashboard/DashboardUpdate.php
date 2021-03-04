<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
use Nemundo\Model\Data\AbstractModelUpdate;
class DashboardUpdate extends AbstractModelUpdate {
/**
* @var DashboardModel
*/
public $model;

/**
* @var string
*/
public $dashboard;

/**
* @var string
*/
public $url;

/**
* @var bool
*/
public $active;

public function __construct() {
parent::__construct();
$this->model = new DashboardModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->dashboard, $this->dashboard);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->active, $this->active);
parent::update();
}
}