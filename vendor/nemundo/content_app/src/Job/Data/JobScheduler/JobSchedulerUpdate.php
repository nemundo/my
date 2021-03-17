<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
use Nemundo\Model\Data\AbstractModelUpdate;
class JobSchedulerUpdate extends AbstractModelUpdate {
/**
* @var JobSchedulerModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->done, $this->done);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->duration, $this->duration);
parent::update();
}
}