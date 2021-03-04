<?php

namespace Nemundo\Content\Index\Tree\Site;

use Nemundo\Content\Index\Tree\Page\TreeConfigPage;
use Nemundo\Content\Index\Tree\Page\TreePage;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Web\Site\AbstractSite;

class TreeConfigSite extends AbstractSite
{

    /**
     * @var TreeConfigSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Config';
        $this->url = 'tree-config';

        TreeConfigSite::$site=$this;

        //new TreeNewSite($this);
        //TreeSite::$site = $this;

    }

    public function loadContent()
    {

        (new TreeConfigPage())->render();


    }
}