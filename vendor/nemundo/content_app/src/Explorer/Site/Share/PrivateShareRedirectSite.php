<?php

namespace Nemundo\Content\App\Explorer\Site\Share;

use Nemundo\Content\App\Explorer\Content\PrivateShare\PrivateShareContentType;
use Nemundo\Content\App\Explorer\Parameter\PrivateShareParameter;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Log\LogMessage;
use Nemundo\User\Login\UserLogin;
use Nemundo\Web\Site\AbstractSite;

class PrivateShareRedirectSite extends AbstractSite
{

    /**
     * @var PrivateShareRedirectSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Public share';
        $this->url = 'public-share-redirect';
        $this->menuActive = false;
        PrivateShareRedirectSite::$site = $this;
    }

    public function loadContent()
    {

        $privateShareId = (new PrivateShareParameter())->getValue();
        $contentType = new PrivateShareContentType($privateShareId);

        if ($contentType->existContent()) {

            $privateShareRow = (new PrivateShareContentType($privateShareId))->getDataRow();

            $login = new UserLogin();
            $login->passwordVerification = false;
            $login->login = $privateShareRow->user->login;
            $login->loginUser();

            $site = clone(ExplorerSite::$site);
            $site->addParameter(new ContentParameter($privateShareRow->contentId));
            $site->redirect();
        } else {
            (new LogMessage())->writeError('No valid Url');
        }


    }
}