<?php

namespace Nemundo\Content\App\Store\Site;

use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Store\Form\HtmlStoreForm;
use Nemundo\Workflow\App\Store\Parameter\StoreParameter;
use Nemundo\Workflow\App\Store\Type\LargeTextStoreType;


class HtmlStoreEditSite extends AbstractSite
{

    /**
     * @var HtmlStoreEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'HtmlStoreEdit';
        $this->url = 'html-store-edit';
    }


    protected function registerSite()
    {
        HtmlStoreEditSite::$site = $this;
    }


    public function loadContent()
    {

        $store = new LargeTextStoreType();
        $store->storeId = (new StoreParameter())->getValue();

        $page = new BootstrapDocument();
        $page->title = 'Edit';

        $page->addHeaderContainer(new JqueryHeader());

        $form = new HtmlStoreForm($page);
        $form->store = $store;
        $form->urlRefererRedirect = true;

        $page->render();

    }

}