<?php


namespace Nemundo\Content\Admin\Site\Json;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Json\ContentTypeJson;
use Nemundo\Core\Text\TextConverter;
use Nemundo\Web\Site\AbstractJsonSite;


class ApplicationJsonSite extends AbstractJsonSite
{

    /**
     * @var ApplicationJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'application-json';
        ApplicationJsonSite::$site = $this;

    }


    protected function loadJson()
    {

        $applicationId = (new ApplicationParameter())->getValue();
        $applicationRow =(new ApplicationReader())->getRowById($applicationId);

        $this->jsonFilename = (new TextConverter())->convertToUrl($applicationRow->application) . '.json';

        $reader = new ContentTypeReader();
        $reader->filter->andEqual($reader->model->applicationId, $applicationId);
        foreach ($reader->getData() as $contentTypeRow) {

            $contentType = $contentTypeRow->getContentType();

            $data = (new ContentTypeJson())->getJsonData($contentType);
            $this->addJsonRow($data);

        }

    }

}