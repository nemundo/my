<?php

namespace My\Site;

use My\Page\HomePage;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Store\HomeContentIdStore;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\User\Session\UserSession;
use Nemundo\Web\Site\AbstractSite;

class HomeSite extends AbstractSite
{

    /**
     * @var HomeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Home';
        $this->url = '';

        HomeSite::$site = $this;

    }

    public function loadContent()
    {

        if ((new UserSession())->isUserLogged()) {

            $contentId = (new HomeContentIdStore())->getValue();

            $site= clone(ExplorerSite::$site);
            $site->addParameter(new ContentParameter($contentId));
            $site->redirect();

        } else {
            (new HomePage())->render();
        }


    }
}