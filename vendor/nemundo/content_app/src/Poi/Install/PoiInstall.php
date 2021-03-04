<?php
namespace Nemundo\Content\App\Poi\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\App\Poi\Data\PoiCollection;
use Nemundo\Content\App\Poi\Application\PoiApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class PoiInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new PoiApplication());
(new ModelCollectionSetup())->addCollection(new PoiCollection());
}
}