<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValueCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ListingValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingValueModel();
}
}