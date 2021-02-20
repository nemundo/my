<?php


namespace Nemundo\Content\Admin\Site\Json;


use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Web\Site\AbstractJsonSite;


// JsonContentSite
class ContentJsonSite extends AbstractJsonSite
{

    /**
     * @var ContentJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'content-json';
        ContentJsonSite::$site = $this;

    }


    protected function loadJson()
    {

        $contentType = (new ContentParameter())->getContentType(false);
        $this->jsonFilename = 'content_' . $contentType->getContentId() . '.json';
        $this->addJsonRow($contentType->getJsonData());


    }

}