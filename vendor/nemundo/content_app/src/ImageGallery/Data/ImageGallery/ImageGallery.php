<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
class ImageGallery extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ImageGalleryModel
*/
protected $model;

/**
* @var string
*/
public $imageGallery;

public function __construct() {
parent::__construct();
$this->model = new ImageGalleryModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->imageGallery, $this->imageGallery);
$id = parent::save();
return $id;
}
}