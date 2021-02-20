<?php

require __DIR__.'/../../config.php';



$projectCollection = new \Nemundo\Project\Collection\ProjectCollection();
$projectCollection->addProject(new \Schleuniger\SchleunigerProject());
$projectCollection->addProject(new \Nemundo\Workflow\WorkflowProject());
$projectCollection->addProject(new \Nemundo\FrameworkProject());
$projectCollection->addProject(new \Nemundo\Process\ProcessProject());
$projectCollection->addProject(new \Nemundo\ToDo\ToDoProject());

\Nemundo\App\ModelDesigner\ModelDesignerConfig::$projectCollection = $projectCollection;


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

new \Nemundo\App\ModelDesigner\Com\ListBox\ModelListBox($html);

$html->render();