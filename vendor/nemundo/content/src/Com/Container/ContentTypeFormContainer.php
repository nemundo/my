<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanel;
use Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanelContainer;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeFormContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var bool
     */
    public $appendContentParameter = false;

    public function getContent()
    {

        //$subtitle = new AdminSubtitle($this);
        //$subtitle->content = $this->contentType->typeLabel;

        $tab = new BootstrapTabsPanel($this);

        $count = 0;
        foreach ($this->contentType->getFormList() as $form) {


            $hidden = new UrlRefererHiddenInput($form);



            $panel = new BootstrapTabsPanelContainer($tab);
            $panel->panelTitle = $form->formName;

            if ($count == 0) {
                $panel->active = true;
            }
            $count++;

            $panel->addContainer($form);

            $form->redirectSite = $this->redirectSite;
            $form->appendContentParameter = $this->appendContentParameter;

        }

        return parent::getContent();

    }

}