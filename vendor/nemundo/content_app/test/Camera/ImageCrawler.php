<?php

require __DIR__ . '/../config.php';


$crawler = new \Nemundo\Crawler\WebCrawler\WebCrawler();
$crawler->url='https://www.zentralbahn.ch/en/pictures';
$crawler->regularExpression='<div class="field field--name-lightbox.*?<a href="(.*?)"';
foreach ($crawler->getData() as $crawlerRow) {

    $imageUrl = $crawlerRow->getValue(0);

    //(new \Nemundo\Core\Debug\Debug())->write($imageUrl);

    $import=new \Nemundo\Content\App\Camera\Content\Camera\CameraContentImport();
    $dataId= $import->fromUrl($imageUrl);

    $cameraContentType = new \Nemundo\Content\App\Camera\Content\Camera\CameraContentType($dataId);

    $builder=new \Nemundo\Content\App\Timeline\Index\TimelineIndexBuilderBuilder($cameraContentType);
    $builder->buildIndex();



}




/*
<div class="field field--name-lightbox field--type-ds field--label-hidden field__item"><div class="gallery uk-grid" data-uk-grid-margin>
            <a href="https://www.zentralbahn.ch/sites/default/files/2018-07/Lungern_02_2.jpg" class="gallery-image uk-width-small-3-3 uk-width-medium-1-2 uk-width-large-1-3" title="Key Visual Luzern–Interlaken Express" data-uk-lightbox="{group:'gallery'}">
            <figure>

*/
