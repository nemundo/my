<?php
namespace Nemundo\Content\App\ImageGallery\Data\Image;
class ImageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $galleryId;

/**
* @var \Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryExternalType
*/
public $gallery;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize800;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize400;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize1600;

protected function loadModel() {
$this->tableName = "imagegallery_image";
$this->aliasTableName = "imagegallery_image";
$this->label = "Image";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagegallery_image";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagegallery_image_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->galleryId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->galleryId->tableName = "imagegallery_image";
$this->galleryId->fieldName = "gallery";
$this->galleryId->aliasFieldName = "imagegallery_image_gallery";
$this->galleryId->label = "Gallery";
$this->galleryId->allowNullValue = true;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "imagegallery_image";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "imagegallery_image_image";
$this->image->label = "Image";
$this->image->allowNullValue = true;
$this->imageAutoSize800 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize800->size = 800;
$this->imageAutoSize400 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize400->size = 400;
$this->imageAutoSize1600 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize1600->size = 1600;

}
public function loadGallery() {
if ($this->gallery == null) {
$this->gallery = new \Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryExternalType($this, "imagegallery_image_gallery");
$this->gallery->tableName = "imagegallery_image";
$this->gallery->fieldName = "gallery";
$this->gallery->aliasFieldName = "imagegallery_image_gallery";
$this->gallery->label = "Gallery";
}
return $this;
}
}