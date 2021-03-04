<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;


class ReinstallSite extends AbstractSite
{

    /**
     * @var UninstallSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Reinstall';
        $this->url = 'reinstall';

        ReinstallSite::$site = $this;

    }


    public function loadContent()
    {

        $app = (new ApplicationParameter())->getApplication();
        $app->reinstallApp();

        (new UrlReferer())->redirect();

    }

}