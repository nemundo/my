<?php


namespace Nemundo\Content\Admin\Site\Json;


use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Json\ContentTypeJson;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Text\TextConverter;
use Nemundo\Web\Site\AbstractJsonSite;


// JsonContentTypeSite
class ContentTypeJsonSite extends AbstractJsonSite
{

    /**
     * @var ContentTypeJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'content-type-json';
        ContentTypeJsonSite::$site = $this;

    }


    protected function loadJson()
    {

        $contentType = (new ContentTypeParameter())->getContentType();
        $this->jsonFilename = (new TextConverter())->convertToUrl($contentType->typeLabel) . '.json';

        $data = (new ContentTypeJson())->getJsonData($contentType);
        $this->addJsonRow($data);

    }

}