<?php

require __DIR__.'/../../config.php';



$project = new \Schleuniger\SchleunigerProject();

(new \Nemundo\Core\Debug\Debug())->write($project->modelPath);

$projectJson = new \Nemundo\App\ModelDesigner\Json\ProjectJson($project);


//\Nemundo\Model\ModelConfig::$dataUrl



foreach ($projectJson->getAppJsonList() as $appJson) {

    (new \Nemundo\Core\Debug\Debug())->write($appJson->appName);

}



/*
use Nemundo\App\ModelDesigner\Json\AppJson;

$appJson = new AppJson();


$appJson->loadType = true;
$appJson->fromProject(new \Nemundo\ToDo\ToDoProject(),'todo');


foreach ($appJson->getModelList() as $model) {
    (new \Nemundo\Core\Debug\Debug())->write($model->label);
}*/





