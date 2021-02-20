<?php
namespace Nemundo\Content\App\Explorer\Data\PrivateShare;
use Nemundo\Model\Data\AbstractModelUpdate;
class PrivateShareUpdate extends AbstractModelUpdate {
/**
* @var PrivateShareModel
*/
public $model;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $groupId;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new PrivateShareModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->groupId, $this->groupId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}