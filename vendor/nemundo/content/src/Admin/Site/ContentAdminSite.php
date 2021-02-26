<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Content\Admin\Page\ContentPage;
use Nemundo\Content\Admin\Site\Container\ContentContainerSite;
use Nemundo\Content\Admin\Site\ContentNewSite;
use Nemundo\Content\Admin\Site\Json\ApplicationJsonSite;
use Nemundo\Content\Admin\Site\Json\ContentJsonSite;
use Nemundo\Content\Admin\Site\Json\ContentTypeJsonSite;
use Nemundo\Content\Index\Geo\Site\GeoIndexSite;
use Nemundo\Content\Index\Group\Site\GroupSite;
use Nemundo\Content\Index\Search\Site\SearchSite;
use Nemundo\Content\Index\Search\Site\SearchWordSite;
use Nemundo\Content\Index\Tree\Site\TreeAdminSite;

use Nemundo\Web\Site\AbstractSite;

class ContentAdminSite extends AbstractSite
{

    /**
     * @var ContentAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content Admin';
        $this->url = 'content-admin';

        ContentAdminSite::$site = $this;

        new ContentNewSite($this);
        new ContentRemoveSite($this);
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

        new ContentContainerSite($this);

    }

    public function loadContent()
    {

        (new ContentPage())->render();

    }


}