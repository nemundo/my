<?php


namespace Nemundo\App\DbBackup\Site;


use Nemundo\App\DbBackup\Page\DbBackupPage;
use Nemundo\Web\Site\AbstractSite;

class DbBackupSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Db Backup';
        $this->url = 'db-backup';

        new DownloadSite($this);

    }

    public function loadContent()
    {
        (new DbBackupPage())->render();
    }

}