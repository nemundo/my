<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Parameter\ContentParameter;


class ContentEditSite extends AbstractEditIconSite
{

    /**
     * @var ContentEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'content-edit';
        ContentEditSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        /*$dataId = (new DataParameter())->getValue();

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $contentRow = $reader->getRowById($dataId);
        $contentType = $contentRow->getContentType();*/

        $contentParameter=new ContentParameter();
        $contentParameter->contentTypeCheck=false;
        $contentType = $contentParameter->getContentType();

        $form = $contentType->getDefaultForm($page);
        $form->redirectSite = ContentItemSite::$site;
        $form->redirectSite->addParameter(new ContentParameter());

        $page->render();

    }

}