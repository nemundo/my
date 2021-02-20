<?php
namespace Nemundo\App\SystemLog\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SystemLogCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\SystemLog\Data\LogType\LogTypeModel());
$this->addModel(new \Nemundo\App\SystemLog\Data\SystemLog\SystemLogModel());
}
}