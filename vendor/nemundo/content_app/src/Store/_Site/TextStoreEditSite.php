<?php

namespace Nemundo\Content\App\Store\Site;

use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Store\Form\TextStoreForm;
use Nemundo\Workflow\App\Store\Parameter\StoreParameter;
use Nemundo\Workflow\App\Store\Type\TextStoreType;

class TextStoreEditSite extends AbstractSite
{

    /**
     * @var HtmlStoreEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'HtmlStoreEdit';
        $this->url = 'text-store-edit';
    }


    protected function registerSite()
    {
        TextStoreEditSite::$site = $this;
    }


    public function loadContent()
    {

        $store = new TextStoreType();
        $store->storeId = (new StoreParameter())->getValue();

        $page = new BootstrapDocument();
        $page->title = 'Edit';

        $form = new TextStoreForm($page);
        $form->store = $store;
        $form->urlRefererRedirect = true;

        $page->render();


    }
}