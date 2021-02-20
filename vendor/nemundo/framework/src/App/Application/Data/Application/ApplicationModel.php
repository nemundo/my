<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $application;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $applicationClass;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $install;

protected function loadModel() {
$this->tableName = "application_application";
$this->aliasTableName = "application_application";
$this->label = "Application";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "application_application";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "application_application_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->application = new \Nemundo\Model\Type\Text\TextType($this);
$this->application->tableName = "application_application";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "application_application_application";
$this->application->label = "Application";
$this->application->allowNullValue = false;
$this->application->length = 255;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "application_application";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "application_application_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

$this->applicationClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->applicationClass->tableName = "application_application";
$this->applicationClass->fieldName = "application_class";
$this->applicationClass->aliasFieldName = "application_application_application_class";
$this->applicationClass->label = "Application Class";
$this->applicationClass->allowNullValue = false;
$this->applicationClass->length = 255;

$this->install = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->install->tableName = "application_application";
$this->install->fieldName = "install";
$this->install->aliasFieldName = "application_application_install";
$this->install->label = "Install";
$this->install->allowNullValue = false;

}
}