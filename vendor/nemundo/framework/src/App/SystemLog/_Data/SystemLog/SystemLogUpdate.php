<?php
namespace Nemundo\App\SystemLog\Data\SystemLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class SystemLogUpdate extends AbstractModelUpdate {
/**
* @var SystemLogModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->message, $this->message);
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->logTypeId, $this->logTypeId);
parent::update();
}
}