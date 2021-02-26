<?php


namespace Nemundo\App\DbBackup\Script;


use Nemundo\App\DbBackup\Builder\DbBackupBuilder;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;

class DbBackupScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'db-backup';
    }


    public function run()
    {

        $builder = new DbBackupBuilder();
        $filename = $builder->buildBackup();

        (new Debug())->write('File is saved: ' . $filename);

    }

}