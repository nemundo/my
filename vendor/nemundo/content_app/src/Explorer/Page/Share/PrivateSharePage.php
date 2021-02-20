<?php

namespace Nemundo\Content\App\Explorer\Page\Share;

use Nemundo\Content\App\Explorer\Content\PrivateShare\PrivateShareContentType;
use Nemundo\Content\App\Explorer\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\Explorer\Parameter\PublicShareParameter;
use Nemundo\Content\App\Explorer\Site\PublicShareSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class PrivateSharePage extends ExplorerTemplate
{

    public function getContent()
    {


        $type =new PrivateShareContentType();
        $type->parentId=(new ContentParameter())->getValue();
        $type->getDefaultForm($this);


        /*
        $reader = new PublicShareReader();
        $reader->filter->andEqual($reader->model->contentId, (new ContentParameter())->getValue());
        foreach ($reader->getData() as $publicShareRow) {

            $site = clone(PublicShareSite::$site);
            $site->addParameter(new PublicShareParameter($publicShareRow->id));

            $input = new BootstrapTextBox($this);
            $input->label = 'Public Url';
            $input->value = $site->getUrlWithDomain();

        }*/

        return parent::getContent();
    }
}