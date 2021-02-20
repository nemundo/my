<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $timeline;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageUrl;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageTimelineModel::class;
$this->externalTableName = "imagetimeline_image_timeline";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->timeline = new \Nemundo\Model\Type\Text\TextType();
$this->timeline->fieldName = "timeline";
$this->timeline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeline->aliasFieldName = $this->timeline->tableName . "_" . $this->timeline->fieldName;
$this->timeline->label = "Timeline";
$this->addType($this->timeline);

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType();
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageUrl->aliasFieldName = $this->imageUrl->tableName . "_" . $this->imageUrl->fieldName;
$this->imageUrl->label = "Image Url";
$this->addType($this->imageUrl);

}
}