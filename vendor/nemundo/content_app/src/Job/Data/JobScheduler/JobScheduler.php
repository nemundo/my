<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobScheduler extends \Nemundo\Model\Data\AbstractModelData {
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

/**
* @var int
*/
public $duration;

public function __construct() {
parent::__construct();
$this->model = new JobSchedulerModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->done, $this->done);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->duration, $this->duration);
$id = parent::save();
return $id;
}
}