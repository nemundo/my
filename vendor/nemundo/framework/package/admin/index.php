<?php

require 'config.php';

$webUrl = '/';

/*
$webUrl =new \Nemundo\Core\Type\Text\Text(\Nemundo\Web\WebConfig::$webUrl);
$webUrl->replaceRight('/web/', '/admin/');
\Nemundo\Web\WebConfig::$webUrl = $webUrl->getValue();
*/

\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\ModelDesigner\Site\ModelDesignerSite());
\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\ClassDesigner\Site\ClassDesignerSite());

(new \Nemundo\Admin\Web\AdminWeb())->loadWeb();
