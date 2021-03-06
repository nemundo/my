<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class Phone extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PhoneModel
*/
protected $model;

/**
* @var string
*/
public $phone;

public function __construct() {
parent::__construct();
$this->model = new PhoneModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->phone, $this->phone);
$id = parent::save();
return $id;
}
}