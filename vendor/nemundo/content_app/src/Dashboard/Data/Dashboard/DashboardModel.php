<?php
namespace Nemundo\Content\App\Dashboard\Data\Dashboard;
class DashboardModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "dashboard_dashboard";
$this->aliasTableName = "dashboard_dashboard";
$this->label = "Dashboard";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dashboard_dashboard";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dashboard_dashboard_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->dashboard = new \Nemundo\Model\Type\Text\TextType($this);
$this->dashboard->tableName = "dashboard_dashboard";
$this->dashboard->fieldName = "dashboard";
$this->dashboard->aliasFieldName = "dashboard_dashboard_dashboard";
$this->dashboard->label = "Dashboard";
$this->dashboard->allowNullValue = true;
$this->dashboard->length = 255;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "dashboard_dashboard";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "dashboard_dashboard_url";
$this->url->label = "Url";
$this->url->allowNullValue = true;
$this->url->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "url";
$index->addType($this->url);

}
}