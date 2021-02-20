<?php
namespace Nemundo\App\SystemLog\Data\LogType;
class LogTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var LogTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new LogTypeModel();
$this->label = $this->model->label;
}
}