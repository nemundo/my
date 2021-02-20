<?php


namespace Nemundo\App\DbBackup\Path;


use Nemundo\Project\Path\TmpPath;

class BackupPath extends TmpPath
{

    public function __construct()
    {
        parent::__construct();
        $this->addPath('db_backup');
    }

}