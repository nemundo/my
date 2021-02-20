<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ApplicationModel
*/
public $model;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->application = $this->getModelValue($model->application);
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
$this->applicationClass = $this->getModelValue($model->applicationClass);
$this->install = boolval($this->getModelValue($model->install));
}
}