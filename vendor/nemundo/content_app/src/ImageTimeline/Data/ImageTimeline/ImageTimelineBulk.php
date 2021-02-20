<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ImageTimelineModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->timeline, $this->timeline);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
$id = parent::save();
return $id;
}
}