<?php


namespace Nemundo\Content\Site;


use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Content\Page\ContentEditPage;
use Nemundo\Content\Page\ContentNewPage;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;


class ContentNewSite extends AbstractEditIconSite
{

    /**
     * @var ContentNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'content-new';
        ContentNewSite::$site = $this;
    }

    public function loadContent()
    {

        (new ContentNewPage())->render();

    }

}