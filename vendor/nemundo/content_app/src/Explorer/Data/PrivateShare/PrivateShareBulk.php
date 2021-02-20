<?php
namespace Nemundo\Content\App\Explorer\Data\PrivateShare;
class PrivateShareBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var PrivateShareModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->groupId, $this->groupId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}