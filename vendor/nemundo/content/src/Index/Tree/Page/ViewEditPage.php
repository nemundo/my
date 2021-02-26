<?php

namespace Nemundo\Content\Index\Tree\Page;


use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Tree\Com\Form\ContentViewChangeForm;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Parameter\ContentParameter;

class ViewEditPage extends AbstractTemplateDocument  // ExplorerTemplate
{

    public function getContent()
    {

        $form = new ContentViewChangeForm($this);
        $form->treeId = (new TreeParameter())->getValue();
        //$form->redirectSite = ExplorerSite::$site;
        //$form->redirectSite->addParameter(new ContentParameter());

        $hidden = new UrlRefererHiddenInput($form);
        $form->redirectSite = new UrlRefererSite();


        return parent::getContent();

    }

}