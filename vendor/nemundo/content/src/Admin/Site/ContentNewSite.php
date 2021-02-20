<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Content\Admin\Page\ContentNewPage;
use Nemundo\Web\Site\AbstractSite;

class ContentNewSite extends AbstractSite
{

    /**
     * @var ContentNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'content-new';
        //$this->menuActive=false;
         ContentNewSite::$site = $this;

    }

    public function loadContent()
    {

        (new ContentNewPage())->render();

        /*  $page = (new DefaultTemplateFactory())->getDefaultTemplate();

          $dropdown = new BootstrapSiteDropdown($page);

          $reader = new ContentTypeReader();
          foreach ($reader->getData() as $contentTypeRow) {

              $site = clone(ContentNewSite::$site);
              $site->title = $contentTypeRow->contentType;
              //$site->addParameter(new DataIdParameter());
              $site->addParameter(new ContentTypeParameter($contentTypeRow->id));

              $dropdown->addSite($site);

          }


          $contentTypeParameter = new ContentTypeParameter();
          if ($contentTypeParameter->exists()) {

              $contentType = (new ContentTypeReader())->getRowById($contentTypeParameter->getValue())->getContentType();

              $form = $contentType->getForm($page);
              $form->redirectSite= ContentNewSite::$site;
              $form->redirectSite->addParameter(new ContentTypeParameter());


              //$form->parentId = $dataId;
              //$form->redirectSite = ContentItemSite::$site;
              //$form->appendParameter=true;

              //$form->redirectSite->addParameter(new DataIdParameter());
              //$form->redirectSite=new Site();

          }



          $page->render();*/


    }


}