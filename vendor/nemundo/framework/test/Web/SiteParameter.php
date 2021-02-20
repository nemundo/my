<?php

require '../config.php';

// ?a[]=1&a[]=2

$url=new \Nemundo\Web\Url\Url();
(new \Nemundo\Core\Debug\Debug())->write($url->getUrl());



/*
$site = new \Nemundo\Web\Site\Site();
(new \Nemundo\Core\Debug\Debug())->write($site->getUrl());
//$url=new \Nemundo\Core\Http\Url\Url();


/*
$url=new \Nemundo\Web\Url\Url()
(new \Nemundo\Core\Debug\Debug())->write()



$site = new \Nemundo\Web\Site\Site();
(new \Nemundo\Core\Debug\Debug())->write($site->getUrl());
*/

