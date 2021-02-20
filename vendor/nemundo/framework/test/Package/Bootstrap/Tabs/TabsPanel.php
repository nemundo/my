<?php

require '../../../config.php';

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$panel = new \Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanel($html);

$container = new \Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanelContainer($panel);
$container->panelTitle = 'One';

$container = new \Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanelContainer($panel);
$container->panelTitle = 'Two';
$container->active = true;

$p = new \Nemundo\Html\Paragraph\Paragraph($container);
$p->content = 'hello world';

$html->render();
