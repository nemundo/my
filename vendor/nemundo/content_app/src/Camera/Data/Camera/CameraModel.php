<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $camera;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

protected function loadModel() {
$this->tableName = "camera_camera";
$this->aliasTableName = "camera_camera";
$this->label = "Camera";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "camera_camera";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "camera_camera_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "camera_camera";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "camera_camera_image";
$this->image->label = "Image";
$this->image->allowNullValue = true;

$this->camera = new \Nemundo\Model\Type\Text\TextType($this);
$this->camera->tableName = "camera_camera";
$this->camera->fieldName = "camera";
$this->camera->aliasFieldName = "camera_camera_camera";
$this->camera->label = "Camera";
$this->camera->allowNullValue = true;
$this->camera->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "camera_camera";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "camera_camera_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

}
}