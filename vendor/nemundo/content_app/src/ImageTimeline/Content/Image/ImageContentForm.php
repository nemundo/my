<?php
namespace Nemundo\Content\App\ImageTimeline\Content\Image;
use Nemundo\Content\Form\AbstractContentForm;
class ImageContentForm extends AbstractContentForm {
/**
* @var ImageContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}