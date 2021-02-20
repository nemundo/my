<?php
namespace Nemundo\Content\App\Explorer\Data\PrivateShare;
class PrivateShareValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PrivateShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PrivateShareModel();
}
}