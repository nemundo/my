<?php

namespace Nemundo\Content\Index\Tree\Site;

use Nemundo\Content\Index\Tree\Page\TreePage;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Web\Site\AbstractSite;

class TreeSite extends AbstractSite
{

    /**
     * @var TreeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Tree';
        $this->url = 'tree';
        new TreeNewSite($this);

        TreeSite::$site = $this;

    }

    public function loadContent()
    {

        $treeParameter=new TreeParameter();
        if ($treeParameter->hasValue()) {
            (new TreePage())->render();
        } else {

            $site = clone(TreeSite::$site);
            $site->addParameter(new TreeParameter(1));
            $site->redirect();

        }


    }
}