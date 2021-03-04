<?php


namespace Nemundo\Content\Page;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Data\ContentAction\ContentActionReader;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentViewParameter;
use Nemundo\Content\Site\ContentViewSite;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ContentViewPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $layout = new BootstrapTwoColumnLayout($this);


        $contentType = (new ContentParameter())->getContent(false);

        //$contentReader = new ContentReader();
        //$contentReader->model->loadUser();
        //$contentRow = $contentReader->getRowById($contentType->getContentId());

        //$title = new AdminTitle($this);
        //$title->content = $contentType->getSubject();

//        $view = new ContentViewListBox($layout->col1);
//        $view->contentType = $contentType;


        $breadcrumb = new TreeBreadcrumb($layout->col1);
        $breadcrumb->redirectSite = ContentViewSite::$site;
        $breadcrumb->addParentContentType($contentType);
        $breadcrumb->addContentType($contentType);

        /*  $dropdown=new RestrictedContentTypeDropdown($layout->col1);
          $dropdown->redirectSite = clone(ContentNewSite::$site);
          $dropdown->redirectSite->addParameter(new ContentParameter());
          $dropdown->contentTypeId = $contentType->typeId;*/


        //$form = new ContentViewSearchForm($layout->col1);
        //$form->contentType = $contentType;


        $widget = new ContentWidget($layout->col1);
        $widget->contentType = $contentType;
        $widget->viewId = (new ContentViewParameter())->getValue();
        //$widget->loadAction = true;
        $widget->editable=false;
        $widget->redirectSite = ContentViewSite::$site;


        /*
        $container = new TreeIndexContainer($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite= ContentViewSite::$site;*/


        $reader = new ContentActionReader();
        $reader->model->loadContentType();
        $reader->addOrder($reader->model->contentType->contentType);

        // sort nach action label

        foreach ($reader->getData() as $actionRow) {
            //$this->addContentAction($actionRow->contentType->getContentType());

            /** @var AbstractContentAction $actionContentType */
            $actionContentType = $actionRow->contentType->getContentType();

            if ($actionContentType->hasView()) {

                /*
                $actionContentType->actionContentId = $contentType->getContentId();

                $widget = new AdminWidget($layout->col2);
                $widget->widgetTitle = $actionContentType->typeLabel;

                $view = $actionContentType->getDefaultView($widget);
                $view->redirectSite = ContentViewSite::$site;
*/


            }

        }


        /*

        $reader = new ChildContentReader();
        $reader->contentType = $contentType;
        foreach ($reader->getData() as $treeRow) {

            $widget = new ContentWidget($layout->col1);
            $widget->contentType = $treeRow->child->getContentType();
            $widget->redirectSite= ContentViewSite::$site;

            //$treeRow->child->getContentType()->getDefaultView($layout->col1);

        }*/


        return parent::getContent();

    }

}