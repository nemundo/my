<?php

namespace Nemundo\Content\Com\Widget;


use Nemundo\Content\Action\ContentActionTrait;
use Nemundo\Content\Builder\ContentViewBuilder;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentViewParameter;
use Nemundo\Content\Site\ContentNewSite;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Formatting\Italic;
use Nemundo\Html\Heading\H5;
use Nemundo\Package\Bootstrap\Card\BootstrapCard;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Web\Site\AbstractSite;

class ContentWidget extends BootstrapCard  // AdminWidget
{

    use ContentActionTrait;

    /**
     * @var AbstractContentType
     */
    public $contentType;
//content


    public $viewId;

    public $showHeader = true;

    /**
     * @var bool
     */
    public $showMenu = true;

    public $widgetTitle;

    /**
     * @var bool
     */
    public $loadAction = false;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getContent()
    {

        $div = new Div($this->cardHeader);
        $div->addCssClass('d-flex justify-content-between align-items-center');

        $divTitle = new Div($div);


        $title = $this->widgetTitle;
        if ($title == null) {
            $title = $this->contentType->getSubject();
        }

        $h5 = new H5($divTitle);
        $h5->content = $title;


        if ($this->showMenu) {

            $divMenu = new Div($divTitle);

            $dropdown = new RestrictedContentTypeDropdown($divMenu);
            $dropdown->redirectSite = clone(ContentNewSite::$site);
            $dropdown->redirectSite->addParameter(new ContentParameter());
            $dropdown->contentTypeId = $this->contentType->typeId;


            $dropdown = new BootstrapSiteDropdown($divMenu);

            //$dropdown->showToggle=false;

            $i = new Italic($dropdown->dropdownButton);
            $i->addCssClass('fa fa-file');

            $reader = new ContentViewReader();
            $reader->filter->andEqual($reader->model->contentTypeId, $this->contentType->typeId);
            $reader->addOrder($reader->model->viewName);
            foreach ($reader->getData() as $viewRow) {

                if ($this->redirectSite !== null) {

                    $site = clone($this->redirectSite);  // new Site();
                    $site->title = $viewRow->viewName;
                    $site->addParameter(new ContentParameter());
                    $site->addParameter(new ContentViewParameter($viewRow->id));

                    //(new Debug())->write($site->getUrl());
                    //(new Debug())->write($viewRow->id);


                    $dropdown->addSite($site);
                }

                //$dropdown->addItem($viewRow->viewName,'');
                //$this->addItem($viewRow->id, $viewRow->viewName);

            }


            $dropdown = new ContentActionDropdown($divMenu);
            $dropdown->contentId = $this->contentType->getContentId();
            $dropdown->showToggle = false;

            foreach ($this->getContentActionList() as $action) {
                $dropdown->addContentAction($action);
            }

            if ($this->loadAction) {
                $dropdown->addDefaultAction();
            }


            $i = new Italic($dropdown->dropdownButton);
            $i->addCssClass('fa fa-ellipsis-v');

        }


        $view = null;
        if ($this->viewId == null) {

            $view = $this->contentType->getDefaultView($this);

        } else {

            $builder = new ContentViewBuilder();
            $builder->contentType = $this->contentType;
            $builder->viewId = $this->viewId;
            $view = $builder->getView($this);

        }

        $view->redirectSite = $this->redirectSite;

        return parent::getContent();

    }


}