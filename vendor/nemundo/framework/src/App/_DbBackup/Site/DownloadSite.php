<?php


namespace Nemundo\App\DbBackup\Site;


use Nemundo\App\DbBackup\Builder\DbBackupBuilder;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Web\Site\AbstractSite;

class DownloadSite extends AbstractSite
{

    /**
     * @var DownloadSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Download';
        $this->url = 'download';
        $this->menuActive = false;

        DownloadSite::$site = $this;

    }

    public function loadContent()
    {

        $builder = new DbBackupBuilder();
        $filename = $builder->buildBackup();

        $response = new FileResponse();
        $response->filename = $filename;
        $response->sendResponse();

    }

}