<?php

namespace My\Controller;

use My\Site\HomeSite;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\Web\Controller\AbstractWebController;

class MyController extends AbstractWebController
{
    protected function loadController()
    {
        new HomeSite($this);
        new AppSite($this);

    }
}