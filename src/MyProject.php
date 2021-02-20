<?php
namespace My;
use Nemundo\Project\AbstractProject;
use Nemundo\Core\Path\Path;
class MyProject extends AbstractProject {
public function loadProject() {
$this->project = 'My';
$this->projectName = 'my';
$this->path = __DIR__;
$this->namespace = __NAMESPACE__;
$this->modelPath = (new Path())
->addPath(__DIR__)
->addParentPath()
->addPath("model")
->getPath();
}
}