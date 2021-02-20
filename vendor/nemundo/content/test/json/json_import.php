<?php

require __DIR__ . '/../config.php';


$filename = 'C:\Users\Urs\Downloads\web-radio.json';


$reader = new \Nemundo\Core\Json\Reader\JsonReader();
$reader->fromFilename($filename);
foreach ($reader->getData() as $json) {

    //(new \Nemundo\Core\Debug\Debug())->write($json[0]);

    if (isset($json['content_type_id'])) {

        $typeId = $json['content_type_id'];
        $contentType = (new \Nemundo\Content\Builder\ContentTypeBuilder())->getContentType($typeId);

        (new \Nemundo\Core\Debug\Debug())->write($typeId);

        $data = $json['data'];
        $contentType->importJson($data);

    }

}






//(new \Nemundo\Core\Debug\Debug())->write($data['data']);


/*$type=new \Nemundo\Crm\Content\Kunde\KundeContentType();
$type->importJson($data);*/


/*
$reader=new \Nemundo\Core\Json\Reader\JsonReader();
$reader->fromFilename($filename);
foreach ($reader->getData() as $jsonItem) {

    (new \Nemundo\Core\Debug\Debug())->write($jsonItem['data']);

}*/




