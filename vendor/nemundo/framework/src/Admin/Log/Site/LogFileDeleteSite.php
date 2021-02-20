<?php

namespace Nemundo\Admin\Log\Site;


use Nemundo\Admin\Log\Script\LogFileDeleteScript;
use Nemundo\Web\Site\AbstractSite;

class LogFileDeleteSite extends AbstractSite
{

    /**
     * @var LogFileDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Delete All Log Files';
        $this->url = 'delete-file';

        LogFileDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        (new LogFileDeleteScript())->run();
        LogFileSite::$site->redirect();

    }

}