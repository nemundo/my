<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
use Nemundo\Model\Data\AbstractModelUpdate;
class LogUpdate extends AbstractModelUpdate {
/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->message, $this->message);
parent::update();
}
}