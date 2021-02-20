<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $logType;

protected function loadModel() {
$this->tableName = "systemlog_log_type";
$this->aliasTableName = "systemlog_log_type";
$this->label = "Log Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "systemlog_log_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "systemlog_log_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->logType = new \Nemundo\Model\Type\Text\TextType($this);
$this->logType->tableName = "systemlog_log_type";
$this->logType->fieldName = "log_type";
$this->logType->aliasFieldName = "systemlog_log_type_log_type";
$this->logType->label = "Log Type";
$this->logType->allowNullValue = false;
$this->logType->length = 255;

$this->addDefaultType($this->logType);
$this->addDefaultOrderType($this->logType);
}
}