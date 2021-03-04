<?php
namespace Nemundo\Content\App\PublicShare\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\PublicShare\Page\PublicShareAdminPage;
class PublicShareAdminSite extends AbstractSite {
protected function loadSite() {
$this->title = 'PublicShareAdmin';
$this->url = 'PublicShareAdmin';
}
public function loadContent() {
(new PublicShareAdminPage())->render();
}
}