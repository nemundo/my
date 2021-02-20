<?php

namespace Nemundo\Admin\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class AdminHomeSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->menuActive = false;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        $page->render();

    }

}