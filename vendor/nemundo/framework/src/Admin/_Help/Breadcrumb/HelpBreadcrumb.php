<?php

namespace Nemundo\Admin\Help\Breadcrumb;


use Nemundo\Admin\Help\HelpConfig;
use Nemundo\Admin\Help\Parameter\HelpParameter;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;

class HelpBreadcrumb extends BootstrapBreadcrumb
{


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->addSite(HelpConfig::$helpSite);

    }


    public function addHelp($help)
    {


        $site = clone(HelpConfig::$helpSite);
        $site->title = $help;
        $site->addParameter(new HelpParameter($help));
        $this->addSite($site);

    }


}