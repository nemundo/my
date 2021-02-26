<?php


namespace Nemundo\Project\Install;


use Nemundo\Com\Package\AbstractPackage;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractInstall extends AbstractBase
{

    // public static $done;
    // only run once


    // run one (only first install)

    /**
     * @var AbstractPackage[]
     */
    //private $packageList;

    protected function loadInstall() {

    }

    abstract public function install();



    public function __construct() {


        $this->loadInstall();

    }



    /*
    public function addPackage(AbstractPackage $package) {

$this->packageList[]=$package;
return $this;

    }

    public function getPackageList() {

        return $this->packageList;

    }*/


}