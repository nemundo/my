<?php
namespace Nemundo\App\SystemLog\Data\SystemLog;
class SystemLog extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SystemLogModel
*/
protected $model;

/**
* @var string
*/
public $message;

/**
* @var string
*/
public $applicationId;

/**
* @var string
*/
public $logTypeId;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->message, $this->message);
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->logTypeId, $this->logTypeId);
$id = parent::save();
return $id;
}
}