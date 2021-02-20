<?php
namespace Nemundo\Content\App\Feiertag\Content\Feiertag;
use Nemundo\Content\Form\AbstractContentForm;
class FeiertagContentForm extends AbstractContentForm {
/**
* @var FeiertagContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}