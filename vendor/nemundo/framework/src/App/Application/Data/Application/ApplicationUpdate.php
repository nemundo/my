<?php
namespace Nemundo\App\Application\Data\Application;
use Nemundo\Model\Data\AbstractModelUpdate;
class ApplicationUpdate extends AbstractModelUpdate {
/**
* @var ApplicationModel
*/
public $model;

/**
* @var string
*/
public $application;

/**
* @var bool
*/
public $setupStatus;

/**
* @var string
*/
public $applicationClass;

/**
* @var bool
*/
public $install;

public function __construct() {
parent::__construct();
$this->model = new ApplicationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->application, $this->application);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$this->typeValueList->setModelValue($this->model->applicationClass, $this->applicationClass);
$this->typeValueList->setModelValue($this->model->install, $this->install);
parent::update();
}
}