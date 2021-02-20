<?php

require '../../config.php';


$setup = new \Nemundo\Com\Package\PackageSetup();
$setup->addPackage(new \Nemundo\Package\Bootstrap\Package\BootstrapPackage());
