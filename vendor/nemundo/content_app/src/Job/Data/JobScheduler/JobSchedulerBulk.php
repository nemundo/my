<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobSchedulerBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var JobSchedulerModel
*/
protected $model;

/**
* @var bool
*/
public $done;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new JobSchedulerModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->done, $this->done);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}