<?php

namespace Nemundo\Dev\ProjectBuilder;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\Path\Path;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Dev\Code\PhpFile;
use Nemundo\Dev\ProjectBuilder\Code\ProjectConfigCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectControllerCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectPackageSetupCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectPageCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectProjectCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectSetupCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectSiteCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectTemplateCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectWebCode;
use Nemundo\FrameworkProject;

use Nemundo\Project\AbstractProject;


class ProjectBuilder extends AbstractBaseClass
{

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var string
     */
    private $projectName;


    public function createProject()
    {

        $this->projectName = strtolower($this->project->namespace);
        $projectPath = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->project->path);

        $this->project->path = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->project->path);

        $this->copyAsset('.gitignore');
        $this->copyAsset('commit.bat');
        $this->copyAsset('deploy');
        $this->copyAsset('config_admin.php');
        $this->copyAsset('.htaccess', 'web');
        $this->copyAsset('cmd.php', 'bin');
        $this->copyAsset('init.php', 'bin');
        $this->copyAsset('config.php', 'bin');

        $pathList = [];
        $pathList[] = $projectPath . 'test';
        $pathList[] = $projectPath . 'web';
        $pathList[] = $projectPath . 'web/img';
        $pathList[] = $projectPath . 'web/css';
        $pathList[] = $projectPath . 'admin';
        $pathList[] = $projectPath . 'bin';
        $pathList[] = $projectPath . 'tmp';
        $pathList[] = $projectPath . 'model';

        foreach ($pathList as $path) {
            (new Path($path))->createPath();
        }

        $code = new ProjectConfigCode();
        $code->path = $projectPath;
        $code->prefixNamespace = $this->project->namespace;
        $code->createCode();

        $webPath = (new Path())
            ->addPath($projectPath)
            ->addPath('web')
            ->getPath();

        $index = new PhpFile();
        $index->filename = $webPath . 'index.php';
        $index->add('require "../config.php";');
        //$index->add('(new \\' . $this->project->namespace . '\\Controller\\' . $this->project->namespace . 'Controller())->render();');
        $index->add('(new \\' . $this->project->namespace . '\\Web\\' . $this->project->namespace . 'Web())->loadWeb();');
        $index->saveFile();

        $binPath = (new Path())
            ->addPath($projectPath)
            ->addPath('bin')
            ->getPath();

        $file = new PhpFile();
        $file->filename = $binPath . 'setup.php';
        $file->add('require  "config.php";');
        $file->add('(new \\' . $this->project->namespace . '\\Setup\\' . $this->project->namespace . 'Setup())->run();');
        $file->saveFile();

        $srcPath = (new Path())
            ->addPath($projectPath)
            ->addPath('src')
            ->getPath();

        $code = new ProjectProjectCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath;
        $code->createCode();

        $code = new ProjectControllerCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Controller';
        $code->createCode();

        $code = new ProjectWebCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Web';
        $code->createCode();

        $code = new ProjectPageCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Page';
        $code->pageClassName = 'Home';
        $code->createCode();

        $code = new ProjectSiteCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Site';
        $code->siteClassName = 'Home';
        $code->createCode();

        $code = new ProjectSetupCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Setup';
        $code->createCode();

        // Package Setup
        /*$code = new ProjectPackageSetupCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Setup';
        $code->createCode();*/


        $code = new ProjectTemplateCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Template';
        $code->createCode();

        $filename =  $projectPath . '.gitignore';
        $gitIgnore = new TextFileWriter($filename);
        $gitIgnore->addLine('config.ini');
        $gitIgnore->addLine('/admin');
        $gitIgnore->addLine('/web/data');
        $gitIgnore->addLine('/tmp');
        $gitIgnore->addLine('/log');
        $gitIgnore->saveFile();

        (new Debug())->write('To Do:');
        (new Debug())->write('- Composer Autoload definieren!!!');

    }


    private function copyAsset($filename, $path = null)
    {

        $copy = new FileCopy();
        $copy->sourceFilename = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath('project_builder')
            ->addPath($filename)
            ->getFilename();

        $destinationFilename = (new Path())
            ->addPath($this->project->path);

        if ($path !== null) {
            $destinationFilename->addPath($path);
        }

        $destinationFilename->addPath($filename);

        $copy->destinationFilename = $destinationFilename->getFilename();
        $copy->copyFile();

    }

}