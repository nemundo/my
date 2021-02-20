<?php

namespace Nemundo\Content\App\PublicShare\Action;


use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Action\AbstractActionContentView;

use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\PublicShare\Parameter\PublicShareParameter;
use Nemundo\Content\App\PublicShare\Site\PublicShareSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class PublicShareView extends AbstractActionContentView
{


    /**
     * @var PublicShareAction
     */
    public $contentType;

    public function getContent()
    {

        $reader = new PublicShareReader();
        $reader->filter->andEqual($reader->model->contentId, $this->contentType->actionContentId);
        foreach ($reader->getData() as $shareRow) {

            $widget = new AdminWidget($this);
            $widget->widgetTitle = 'Public Share';


            $site = clone(PublicShareSite::$site);
            $site->addParameter(new PublicShareParameter($shareRow->id));

            $input = new BootstrapTextBox($widget);
            $input->name = 'public_url';
            $input->label = 'Public Url';
            $input->value = $site->getUrlWithDomain();


            $btn = new AdminCopyButton($widget);
            $btn->copyId = $input->name;

            // löschen
            // copy

      /*      $btn = new AdminIconSiteButton($widget);
            $btn->site = clone(PublicShareDeleteSite::$site);
            $btn->site->addParameter(new ContentParameter($shareRow->contentId));
*/


        }

        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}