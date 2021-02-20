<?php
namespace Nemundo\Content\App\ImageTimeline\Com\ListBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
class TimelineListBox extends BootstrapListBox {
public function getContent() {
$this->label='Timeline';
return parent::getContent();
}
}