<?php
namespace Nemundo\App\SystemLog\Data\SystemLog;
class SystemLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SystemLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemLogModel();
}
}