<?php

require __DIR__ . '/../../../config_admin.php';


(new \Nemundo\App\ModelDesigner\Script\ModelDesignerOrmScript())->run();



/*$orm = new \Nemundo\Admin\AppDesigner\Orm\ProjectOrm();
$orm->project = new \Nemundo\FrameworkProject();
$orm->deleteOrm();*/
//$orm->createOrm();*/

