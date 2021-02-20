<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var LogModel
*/
protected $model;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->message, $this->message);
$id = parent::save();
return $id;
}
}