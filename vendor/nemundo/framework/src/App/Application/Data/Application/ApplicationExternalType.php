<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ApplicationModel::class;
$this->externalTableName = "application_application";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->application = new \Nemundo\Model\Type\Text\TextType();
$this->application->fieldName = "application";
$this->application->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->application->aliasFieldName = $this->application->tableName . "_" . $this->application->fieldName;
$this->application->label = "Application";
$this->addType($this->application);

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->setupStatus->aliasFieldName = $this->setupStatus->tableName . "_" . $this->setupStatus->fieldName;
$this->setupStatus->label = "Setup Status";
$this->addType($this->setupStatus);

$this->applicationClass = new \Nemundo\Model\Type\Text\TextType();
$this->applicationClass->fieldName = "application_class";
$this->applicationClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->applicationClass->aliasFieldName = $this->applicationClass->tableName . "_" . $this->applicationClass->fieldName;
$this->applicationClass->label = "Application Class";
$this->addType($this->applicationClass);

$this->install = new \Nemundo\Model\Type\Number\YesNoType();
$this->install->fieldName = "install";
$this->install->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->install->aliasFieldName = $this->install->tableName . "_" . $this->install->fieldName;
$this->install->label = "Install";
$this->addType($this->install);

}
}