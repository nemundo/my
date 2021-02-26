<?php

namespace Nemundo\App\Application\Type;

use Nemundo\App\Application\Data\Application\ApplicationUpdate;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Com\Package\AbstractPackage;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Collection\AbstractModelCollection;
use Nemundo\Project\AbstractProject;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Project\Install\AbstractUninstall;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractApplication extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $applicationId;

    /**
     * @var string
     */
    public $application;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $applicationName;

    /**
     * @var string
     */
    public $modelCollectionClass;

    /**
     * @var string
     */
    protected $installClass;

    /**
     * @var string
     */
    protected $uninstallClass;

    /**
     * @var string
     */
    //public $cleanClass;

    // adminSite
    // usergroupCollection
    // addUsergroup


    /**
     * @var string
     */
    protected $adminSiteClass;


    /**
     * @var string
     */
    protected $siteClass;


    //protected $projectClass;

    /**
     * @var AbstractProject
     */
    public $project;


    /**
     * @var string[]
     */
    private static $installDone = [];


    abstract protected function loadApplication();

    public function __construct()
    {
        $this->loadApplication();
    }


    public function getModelCollection()
    {


        $modelCollection = null;

        $className = $this->modelCollectionClass;
        if (class_exists($className)) {

            /** @var AbstractModelCollection $modelCollection */
            $modelCollection = new $className();
        }

        return $modelCollection;

    }


    public function hasInstall()
    {

        $value = false;
        if ($this->installClass !== null) {
            if (class_exists($this->installClass)) {
                $value = true;
            } else {
                (new Debug())->write('Install Class not found. Class: ' . $this->installClass);
            }
        }
        return $value;

    }


    public function getInstall()
    {

        /** @var AbstractInstall $install */
        $install = new $this->installClass();

        return $install;

    }


    public function installApp()
    {

        (new ApplicationSetup())
            ->addApplication($this);

        if ($this->hasInstall()) {

            if (!isset(AbstractApplication::$installDone[$this->applicationId])) {

                /** @var AbstractInstall $install */
                //$install = new $this->installClass();

                $install = $this->getInstall();
                $install->install();

                $update = new ApplicationUpdate();
                $update->install = true;
                $update->updateById($this->applicationId);

                AbstractApplication::$installDone[$this->applicationId] = true;

            }

        } else {

            (new Debug())->write('No Install Class. Class: ' . $this->getClassName());

        }

        return $this;

    }


    public function hasUninstall()
    {

        $value = false;
        if (class_exists($this->uninstallClass)) {
            $value = true;
        }
        return $value;

    }


    public function uninstallApp()
    {

        if ($this->hasUninstall()) {

            /** @var AbstractUninstall $install */
            $install = new $this->uninstallClass();
            $install->uninstall();

            $update = new ApplicationUpdate();
            $update->install = false;
            $update->updateById($this->applicationId);


        } else {

            (new Debug())->write('No UnInstall Class');

        }

    }


    public function reinstallApp()
    {

        $this->uninstallApp();
        $this->installApp();

    }


    public function hasSite()
    {

        $value = false;
        if ($this->siteClass !== null) {
            $value = true;
        }
        return $value;

    }


    public function getSite(AbstractSite $parentSite)
    {

        $site = new $this->siteClass($parentSite);
        return $site;

    }


    public function hasAdminSite()
    {

        $value = false;
        if ($this->adminSiteClass !== null) {
            $value = true;
        }
        return $value;

    }


    public function getAdminSite(AbstractSite $parentSite)
    {

        $site = new $this->adminSiteClass($parentSite);
        return $site;

    }



    //protected function addPackageClass()

    /**
     * @var AbstractPackage[]
     */
    private $packageList = [];

    protected function addPackage(AbstractPackage $package)
    {

        $this->packageList[] = $package;
        return $this;

    }


    public function getPackageList()
    {

        return $this->packageList;

    }


    /*
    public function getProject() {

        $project=null;

        if (class_exists($this->projectClass)) {
    $project = new $this->projectClass();

        }
        return $project; $value;


    }*/


}