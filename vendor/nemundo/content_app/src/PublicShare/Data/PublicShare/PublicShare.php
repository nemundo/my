<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicShare extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PublicShareModel
*/
protected $model;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new PublicShareModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}