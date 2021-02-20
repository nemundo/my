<?php


namespace Nemundo\Project\Install;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractInstall extends AbstractBase
{

    // public static $done;
    // only run once


    // run one (only first install)


    abstract public function install();

}