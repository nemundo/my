<?php

namespace Nemundo\Content\App\Camera\Site;

use Nemundo\Content\App\Camera\Page\CameraPage;
use Nemundo\Web\Site\AbstractSite;

class CameraSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Camera';
        $this->url = 'camera';
    }

    public function loadContent()
    {
        (new CameraPage())->render();
    }
}