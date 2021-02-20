<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

class InstallSite extends AbstractSite
{

    /**
     * @var InstallSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Install';
        $this->url = 'install';

        InstallSite::$site=$this;

    }


    public function loadContent()
    {

        $app = (new ApplicationParameter())->getApplication();
        $app->installApp();

        (new UrlReferer())->redirect();

    }

}