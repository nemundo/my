<?php

namespace Nemundo\Dev\Install;


use Nemundo\Com\Package\PackageSetup;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\Path\Path;
use Nemundo\FrameworkProject;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Project\Path\ProjectPath;


class AdminPackageInstall extends AbstractBase
{

    /**
     * @var string
     */
    private $projectPath;


    public function install()
    {

        $this->projectPath = (new ProjectPath())
            ->addPath('admin')
            ->getPath();

        $this->copyAssetFile('.htaccess', '.htaccess');
        $this->copyAssetFile('config.php', 'config.php');
        $this->copyAssetFile('index.php', 'index.php');
        $this->copyAssetFile('start.bat', 'start.bat');

        $setup = new PackageSetup();
        $setup->destinationPath = $this->projectPath;
        $setup->addPackage(new BootstrapPackage());
        $setup->addPackage(new FontAwesomePackage());
        $setup->addPackage(new JqueryPackage());
        $setup->addPackage(new JqueryUiPackage());
        $setup->addPackage(new NemundoJsPackage());

    }


    private function copyAssetFile($filenameFrom, $filenameTo)
    {

        $fileCopy = new FileCopy();
        $fileCopy->sourceFilename = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath('admin')
            ->addPath($filenameFrom)
            ->getFilename();

        $fileCopy->destinationFilename = (new Path())
            ->addPath($this->projectPath)
            ->addPath($filenameTo)
            ->getFilename();

        $fileCopy->copyFile();

    }

}