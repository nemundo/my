<?php
namespace Nemundo\App\Application\Data\Application;
class Application extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ApplicationModel
*/
protected $model;

/**
* @var string
*/
public $id;

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
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->application, $this->application);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$this->typeValueList->setModelValue($this->model->applicationClass, $this->applicationClass);
$this->typeValueList->setModelValue($this->model->install, $this->install);
$id = parent::save();
return $id;
}
}