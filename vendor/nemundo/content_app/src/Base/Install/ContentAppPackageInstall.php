<?php


namespace Nemundo\Content\App\Base\Install;


use Nemundo\Com\Package\PackageSetup;
use Nemundo\Package\CkEditor5\CkEditor5Package;
use Nemundo\Package\Dropzone\DropzonePackage;
use Nemundo\Package\Fancybox\FancyboxPackage;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ContentAppPackageInstall extends AbstractInstall
{

    public function install()
    {

        (new PackageSetup())
            ->addPackage(new CkEditor5Package())
            ->addPackage(new DropzonePackage())
            ->addPackage(new FancyboxPackage());


    }

}