<?php


namespace Nemundo\Content\Site;


use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

class ContentIndexSite extends AbstractSite
{

    /**
     * @var ContentIndexSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Content Index';
        $this->url = 'content-index';
        $this->menuActive = false;

        ContentIndexSite::$site = $this;

    }


    public function loadContent()
    {

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $contentType = $contentParameter->getContent();
        $contentType->saveIndex();

        (new UrlReferer())->redirect();

    }

}