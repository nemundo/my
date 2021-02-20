<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Content\Admin\Page\ContentTypePage;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeSite extends AbstractSite
{

    /**
     * @var ContentTypeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Content Type';
        $this->url = 'content-type';
        ContentTypeSite::$site = $this;

    }

    public function loadContent()
    {

        (new ContentTypePage())->render();

    }


}