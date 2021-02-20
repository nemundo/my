<?php
namespace Nemundo\App\SystemLog\Data\SystemLog;
class SystemLogListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SystemLogModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SystemLogModel();
$this->label = $this->model->label;
}
}