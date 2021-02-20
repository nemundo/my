<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "imagetimeline_image_timeline";
$this->aliasTableName = "imagetimeline_image_timeline";
$this->label = "Image Timeline";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagetimeline_image_timeline";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagetimeline_image_timeline_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->timeline = new \Nemundo\Model\Type\Text\TextType($this);
$this->timeline->tableName = "imagetimeline_image_timeline";
$this->timeline->fieldName = "timeline";
$this->timeline->aliasFieldName = "imagetimeline_image_timeline_timeline";
$this->timeline->label = "Timeline";
$this->timeline->allowNullValue = true;
$this->timeline->length = 255;

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageUrl->tableName = "imagetimeline_image_timeline";
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->aliasFieldName = "imagetimeline_image_timeline_image_url";
$this->imageUrl->label = "Image Url";
$this->imageUrl->allowNullValue = true;
$this->imageUrl->length = 255;

}
}