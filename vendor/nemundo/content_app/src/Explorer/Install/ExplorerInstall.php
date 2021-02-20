<?php

namespace Nemundo\Content\App\Explorer\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Explorer\Application\ExplorerApplication;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\App\Explorer\Content\Container\ContainerRenameLogContentType;
use Nemundo\Content\App\Explorer\Content\PrivateShare\PrivateShareContentType;
use Nemundo\Content\App\Explorer\Data\ExplorerModelCollection;
use Nemundo\Content\App\Explorer\Store\HomeContentIdStore;
use Nemundo\Content\App\Store\Application\StoreApplication;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class ExplorerInstall extends AbstractInstall
{

    public function install()
    {


        (new StoreApplication())->installApp();

        (new ApplicationSetup())
            ->addApplication(new ExplorerApplication());

        (new ModelCollectionSetup())
            ->addCollection(new ExplorerModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new ContainerContentType())
            ->addContentType(new ContainerRenameLogContentType())
            ->addContentType(new PrivateShareContentType());

        //    ->addContentType(new BaseContainerContentType());

//        (new BaseContainerContentType())->saveType();

        $store = new HomeContentIdStore();

        if (!$store->hasValue()) {

            $container = new ContainerContentType();
            $container->container = 'Home';
            $container->saveType();

            $store->setValue($container->getContentId());

            //(new Debug())->write($container->getContentId());


        }


        /*
        (new ExplorerSetup())
            ->addContentType(new ContainerContentType());
*/


    }
}