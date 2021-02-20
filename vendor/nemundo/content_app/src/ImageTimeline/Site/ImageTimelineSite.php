<?php
namespace Nemundo\Content\App\ImageTimeline\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\ImageTimeline\Page\ImageTimelinePage;
class ImageTimelineSite extends AbstractSite {
protected function loadSite() {
$this->title = 'ImageTimeline';
$this->url = 'ImageTimeline';
}
public function loadContent() {
(new ImageTimelinePage())->render();
}
}