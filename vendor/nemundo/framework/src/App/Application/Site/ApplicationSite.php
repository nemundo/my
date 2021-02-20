<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Page\ApplicationPage;
use Nemundo\Web\Site\AbstractSite;

class ApplicationSite extends AbstractSite
{

    /**
     * @var ApplicationSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Application';
        $this->url = 'application';
        ApplicationSite::$site = $this;

        new InstallSite($this);
        new UninstallSite($this);
        new ReinstallSite($this);

    }


    public function loadContent()
    {

        (new ApplicationPage())->render();

    }

}