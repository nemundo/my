<?php


namespace Nemundo\App\DbBackup\Builder;


use Nemundo\App\DbBackup\Path\BackupPath;
use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Provider\MySql\Dump\MySqlDump;
use Nemundo\Model\ModelConfig;

class DbBackupBuilder extends AbstractBase
{

    public function buildBackup()
    {

        $dumpFilename = (new BackupPath())
            ->addPath('dump.sql')
            ->getFilename();

        $backupFilename = (new BackupPath())
            ->addPath('backup.zip')
            ->getFilename();

        $file = new File($backupFilename);
        if ($file->fileExists()) {
            $file->deleteFile();
        }


        $dump = new MySqlDump();
        $dump->dumpFilename = $dumpFilename;
        $dump->createDumpFile();

        $zip = new ZipArchive();
        $zip->archiveFilename = $backupFilename;
        $zip->addPath(ModelConfig::$redirectDataPath, 'data_redirect' . DIRECTORY_SEPARATOR);
        $zip->addPath(ModelConfig::$dataPath, 'data' . DIRECTORY_SEPARATOR);

        $zip->addFilename($dumpFilename);
        $zip->createArchive();

         (new File($dumpFilename))->deleteFile();

        return $backupFilename;

    }

}