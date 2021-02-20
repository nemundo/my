<?php

namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractKmlIconSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title = 'Kml (Google Earth)';
        $this->url = 'kml';
        parent::__construct($site);
        $this->icon = new FontAwesomeIcon();
        $this->icon->icon = 'globe';

    }


    protected function loadSite()
    {

    }

}