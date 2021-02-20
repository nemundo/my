<?php

namespace Nemundo\Content\App\Map\Content\SwissMap;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Geo\Map\GeoAdmin\GeoAdminMap;

class SwissMapContentView extends AbstractContentView
{
    /**
     * @var SwissMapContentType
     */
    public $contentType;

    public function getContent()
    {

        $map = new GeoAdminMap($this);
        $map->addLayer(\Nemundo\Geo\Map\GeoAdmin\GeoAdminMapLayer::PIXELKARTE);
        $map->zoom = 18;

        return parent::getContent();

    }

}