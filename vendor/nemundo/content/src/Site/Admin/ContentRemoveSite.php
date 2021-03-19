<?php


namespace Nemundo\Content\Site\Admin;


use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ContentRemoveSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentRemoveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Remove Content';
        $this->url = 'remove-content';

        ContentRemoveSite::$site = $this;

    }


    public function loadContent()
    {

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        $contentType = $contentTypeParameter->getContentType();

        (new ContentTypeSetup())->removeContent($contentType);

        /*
        $reader = new ContentReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        foreach ($reader->getData() as $contentRow) {
            $contentType = $contentRow->getContentType();
            $contentType->deleteType();
        }*/


        /*
        $delete=new ContentDelete();
        $delete->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        $delete->delete();*/

        (new UrlReferer())->redirect();


    }

}