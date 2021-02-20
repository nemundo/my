<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
use Nemundo\Model\Data\AbstractModelUpdate;
class ImageTimelineUpdate extends AbstractModelUpdate {
/**
* @var ImageTimelineModel
*/
public $model;

/**
* @var string
*/
public $timeline;

/**
* @var string
*/
public $imageUrl;

public function __construct() {
parent::__construct();
$this->model = new ImageTimelineModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->timeline, $this->timeline);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
parent::update();
}
}