<?php

require '../../../config.php';

new \Dev\Controller\DevController();


$document = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$navbar = new \Nemundo\Package\Bootstrap\Navbar\BootstrapNavbar($document);

$brand=new \Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarBrand($navbar);
$brand->content='Test';











//$navbar = new \Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar($document);






$document->render();