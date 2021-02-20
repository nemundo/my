<?php
namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline;
use Nemundo\Content\Form\AbstractContentForm;
class ImageTimelineContentForm extends AbstractContentForm {
/**
* @var ImageTimelineContentType
*/
public $contentType;

public function getContent() {
return parent::getContent();
}
public function onSubmit() {
$this->contentType->saveType();
}
}