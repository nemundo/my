<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
use Nemundo\Model\Data\AbstractModelUpdate;
class PublicShareUpdate extends AbstractModelUpdate {
/**
* @var PublicShareModel
*/
public $model;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new PublicShareModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
parent::update();
}
}