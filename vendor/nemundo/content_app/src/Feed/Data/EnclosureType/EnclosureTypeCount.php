<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var EnclosureTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureTypeModel();
}
}