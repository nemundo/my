<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ContentTypeRemoveSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentTypeRemoveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Remove Content Type';
        $this->url = 'remove-content-type';

        ContentTypeRemoveSite::$site = $this;

    }


    public function loadContent()
    {

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        $contentType = $contentTypeParameter->getContentType();

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        foreach ($reader->getData() as $contentRow) {
            $contentType = $contentRow->getContentType();
            $contentType->deleteType();
        }


        $delete=new ContentDelete();
        $delete->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        $delete->delete();

        (new UrlReferer())->redirect();

    }

}