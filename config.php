<?php
error_reporting(E_ALL);
require 'vendor/autoload.php';
\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;

$loader = new \Nemundo\Project\Loader\SqLiteProjectLoader();
$loader->loadConfigFile = false;
$loader->loadProject();


//\Nemundo\Admin\AdminConfig::$defaultTemplateClassName = \My\Template\MyTemplate::class;
//\Nemundo\Admin\AdminConfig::$webController = new \My\Controller\MyController();



