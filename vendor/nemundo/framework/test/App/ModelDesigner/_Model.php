<?php

require __DIR__.'/../../config.php';

$id = 'fb4435ef-6bd7-4529-9d64-3dbd2c01cb5c';


$project = new \Schleuniger\SchleunigerProject();


$projectJson = new \Nemundo\App\ModelDesigner\Json\ProjectJson($project);


/*
foreach ($projectJson->getAppJsonList() as $appJson) {
    //(new \Nemundo\Core\Debug\Debug())->write($appJson->appLabel);
}*/


//$app = new \Nemundo\App\ModelDesigner\Json\AppJson();
//$app->fromProject($project);
