<?php

namespace Nemundo\Content\Index\Geo\Site;

use Nemundo\Content\Index\Geo\Page\GeoIndexPage;
use Nemundo\Content\Index\Geo\Site\Kml\GeoIndexKmlSite;
use Nemundo\Web\Site\AbstractSite;

// GeoSite
class GeoIndexSite extends AbstractSite
{

    /**
     * @var GeoIndexSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Geo';
        $this->url = 'geo-index';

        GeoIndexSite::$site=$this;

        new GeoIndexKmlSite($this);

    }

    public function loadContent()
    {

        (new GeoIndexPage())->render();

    }
}