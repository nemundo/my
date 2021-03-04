<?php
namespace Nemundo\Content\App\ImageTimeline\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ImageTimelineModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\ImageTimeline\Data\Image\ImageModel());
$this->addModel(new \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineModel());
$this->addModel(new \Nemundo\Content\App\ImageTimeline\Data\Source\SourceModel());
}
}