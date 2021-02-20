<?php


namespace Nemundo\App\DbBackup\Script;


use Nemundo\App\DbBackup\Path\UploadRestoreFilename;
use Nemundo\App\DbBackup\Path\UploadRestorePath;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Archive\ZipExtractor;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\DirectoryCopy;
use Nemundo\Db\Provider\MySql\Dump\MySqlDumpRestore;
use Nemundo\Dev\Job\DataFileDeleteScript;
use Nemundo\Model\ModelConfig;

class DbBackupRestoreScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'db-restore';
    }


    public function run()
    {


        /*
        $input = new ConsoleInput();
        $input->message = 'All Data will be deletet!!! Please Confirm.8+2';
        $input->defaultValue = '';
        if ($input->getValue() !=='10') {
            (new Debug())->write('Wrong result. You should think about your action!');
            exit;
        }*/


        /*$input = new ConsoleInput();
        $input->message = 'Backup Zip Filename';
        $input->defaultValue = (new UploadRestoreFilename())->getFilename();  // 'C:\test\backup.zip';
        $zipFilename = $input->getValue();*/



        /*(new UploadRestorePath())->createPath();

        $zip = new ZipExtractor();
        $zip->archiveFilename = (new UploadRestoreFilename())->getFilename();  // $zipFilename;
        $zip->extractPath = (new UploadRestorePath())->getPath();
        $zip->extract();*/









        $dump = new MySqlDumpRestore();
        $dump->filename = (new UploadRestorePath())->addPath('dump.sql')->getFilename();
        $dump->restoreDumpFile();


        (new DataFileDeleteScript())->run();


        $copy = new DirectoryCopy();
        $copy->sourcePath = (new UploadRestorePath())
            ->addPath('data')->getPath();
        $copy->destinationPath = ModelConfig::$dataPath;
        $copy->copyDirectory();

        $copy = new DirectoryCopy();
        $copy->sourcePath = (new UploadRestorePath())
            ->addPath('data_redirect')->getPath();
        $copy->destinationPath = ModelConfig::$redirectDataPath;
        $copy->copyDirectory();


        /*
           $zip->addPath(ModelConfig::$redirectDataPath, 'data_redirect' . DIRECTORY_SEPARATOR);
        $zip->addPath(ModelConfig::$dataPath, 'data' . DIRECTORY_SEPARATOR);
*/


        (new Debug())->write('Backup Restore finished');

        (new Debug())->write('Maybe you want to run Setup Script');


    }

}