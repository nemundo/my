<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $viewName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $viewClass;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "content_view";
$this->aliasTableName = "content_view";
$this->label = "Content View";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_view";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_view_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "content_view";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "content_view_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$this->viewName = new \Nemundo\Model\Type\Text\TextType($this);
$this->viewName->tableName = "content_view";
$this->viewName->fieldName = "view_name";
$this->viewName->aliasFieldName = "content_view_view_name";
$this->viewName->label = "View Name";
$this->viewName->allowNullValue = false;
$this->viewName->length = 255;

$this->viewClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->viewClass->tableName = "content_view";
$this->viewClass->fieldName = "view_class";
$this->viewClass->aliasFieldName = "content_view_view_class";
$this->viewClass->label = "View Class";
$this->viewClass->allowNullValue = false;
$this->viewClass->length = 255;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "content_view";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "content_view_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "view_class";
$index->addType($this->contentTypeId);
$index->addType($this->viewClass);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_view_content_type");
$this->contentType->tableName = "content_view";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_view_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}