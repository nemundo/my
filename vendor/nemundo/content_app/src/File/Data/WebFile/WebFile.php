<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFile extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WebFileModel
*/
protected $model;

/**
* @var \Nemundo\Model\Data\Property\File\FileDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new WebFileModel();
$this->file = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->file, $this->typeValueList);
}
public function save() {
$id = parent::save();
return $id;
}
}