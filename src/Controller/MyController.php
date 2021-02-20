<?php

namespace My\Controller;

use My\Site\HomeSite;
use Nemundo\App\Application\Site\AdminSite;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Content\Site\ContentActionSite;
use Nemundo\Web\Controller\AbstractWebController;

class MyController extends AbstractWebController
{
    protected function loadController()
    {

        new HomeSite($this);

        new AppSite($this);
        new AdminSite($this);

        new UserActionSite($this);
        new ContentActionSite($this);

    }
}