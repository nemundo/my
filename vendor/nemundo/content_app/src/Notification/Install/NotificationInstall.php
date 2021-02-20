<?php
namespace Nemundo\Content\App\Notification\Install;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\App\Notification\Data\NotificationModelCollection;
use Nemundo\Content\App\Notification\Application\NotificationApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class NotificationInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new NotificationApplication());
(new ModelCollectionSetup())->addCollection(new NotificationModelCollection());
}
}