<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
class DashboardExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $dashboard;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = DashboardModel::class;
$this->externalTableName = "dashboard_dashboard";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->dashboard = new \Nemundo\Model\Type\Text\TextType();
$this->dashboard->fieldName = "dashboard";
$this->dashboard->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dashboard->aliasFieldName = $this->dashboard->tableName . "_" . $this->dashboard->fieldName;
$this->dashboard->label = "Dashboard";
$this->addType($this->dashboard);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

}
}