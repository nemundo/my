<?php


namespace Nemundo\Content\Site\Admin;


use Nemundo\Content\Page\Admin\ContentAdminPage;
use Nemundo\Web\Site\AbstractSite;


class ContentAdminSite extends AbstractSite
{

    /**
     * @var ContentAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content';
        $this->url = 'content-admin';

        ContentAdminSite::$site = $this;

        new ContentListingSite($this);
        new ContentTypeSite($this);

        new ContentRemoveSite($this);

        //new ContentNewSite($this);
        //new ContentRemoveSite($this);

        /*
        new ContentTypeSite($this);

        new ContentJsonSite($this);
        new ContentTypeJsonSite($this);
        new ApplicationJsonSite($this);


        new SearchSite($this);
        new SearchWordSite($this);

        new GroupSite($this);
        new GeoIndexSite($this);
        new TreeAdminSite($this);
        new ImportSite($this);

        new ContentItemSite($this);
        new ContentDeleteSite($this);
        new ContentTypeRemoveSite($this);

        new ContentContainerSite($this);*/

    }

    public function loadContent()
    {

        (new ContentAdminPage())->render();

    }


}