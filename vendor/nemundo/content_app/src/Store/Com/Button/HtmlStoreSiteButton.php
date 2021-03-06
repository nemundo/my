<?php

namespace Nemundo\Content\App\Store\Com\Button;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Workflow\App\Store\Parameter\StoreParameter;
use Nemundo\Workflow\App\Store\Site\HtmlStoreEditSite;
use Nemundo\Workflow\App\Store\Type\AbstractTextStoreType;

class HtmlStoreSiteButton extends AdminSiteButton
{

    /**
     * @var AbstractTextStoreType
     */
    public $store;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->content = 'edit';

    }


    public function getContent()
    {

        $this->site = HtmlStoreEditSite::$site;
        $this->site->addParameter(new StoreParameter($this->store->storeId));

        return parent::getContent();

    }

}