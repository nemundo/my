<?php
namespace Nemundo\App\SystemLog\Data\SystemLog;
class SystemLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Data\Application\ApplicationExternalType
*/
public $application;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $logTypeId;

/**
* @var \Nemundo\App\SystemLog\Data\LogType\LogTypeExternalType
*/
public $logType;

protected function loadModel() {
$this->tableName = "systemlog_system_log";
$this->aliasTableName = "systemlog_system_log";
$this->label = "System Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "systemlog_system_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "systemlog_system_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "systemlog_system_log";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "systemlog_system_log_message";
$this->message->label = "Message";
$this->message->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "systemlog_system_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "systemlog_system_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;
$this->dateTime->visible->form = false;

$this->applicationId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->applicationId->tableName = "systemlog_system_log";
$this->applicationId->fieldName = "application";
$this->applicationId->aliasFieldName = "systemlog_system_log_application";
$this->applicationId->label = "Application";
$this->applicationId->allowNullValue = false;

$this->logTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->logTypeId->tableName = "systemlog_system_log";
$this->logTypeId->fieldName = "log_type";
$this->logTypeId->aliasFieldName = "systemlog_system_log_log_type";
$this->logTypeId->label = "Log Type";
$this->logTypeId->allowNullValue = false;

}
public function loadApplication() {
if ($this->application == null) {
$this->application = new \Nemundo\App\Application\Data\Application\ApplicationExternalType($this, "systemlog_system_log_application");
$this->application->tableName = "systemlog_system_log";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "systemlog_system_log_application";
$this->application->label = "Application";
}
return $this;
}
public function loadLogType() {
if ($this->logType == null) {
$this->logType = new \Nemundo\App\SystemLog\Data\LogType\LogTypeExternalType($this, "systemlog_system_log_log_type");
$this->logType->tableName = "systemlog_system_log";
$this->logType->fieldName = "log_type";
$this->logType->aliasFieldName = "systemlog_system_log_log_type";
$this->logType->label = "Log Type";
}
return $this;
}
}