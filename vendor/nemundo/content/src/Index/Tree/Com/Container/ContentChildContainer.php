<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\Action\DeleteContentAction;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Action\RemoveContent\RemoveContentAction;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\Index\Tree\Site\ContentRemoveSite;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;


// ContentChildContainer
class ContentChildContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    public function getContent()
    {

        (new Hr($this));


        $reader = new ChildContentReader();  // new ChildContentTypeReader();
        $reader->contentType = $this->contentType;

        foreach ($reader->getData() as $treeRow) {



            // $child->id

            //foreach ($this->contentType->getChild() as $child) {

            //$childContentType = $child->getContentType();
            $child = $treeRow->child->getContentType();
            if ($child->hasView()) {

                $div = new Div($this);
                $child->getDefaultView($div);

                $btn = new AdminIconSiteButton($div);
                $btn->site = clone(ContentRemoveSite::$site);
                $btn->site->addParameter(new TreeParameter($treeRow->id));

                (new Hr($this));


                /*
                $widget = new ContentWidget($this);
                $widget->contentType= $child;
                $widget->addContentAction(new DeleteContentAction());
*/

                /*
                $action=new RemoveContentAction();
                $action->treeId = $treeRow->id;
                $widget->addContentAction($action);
*/



            }

        }



        /*
        $reader = new ChildContentTypeReader();
        $reader->contentType = $this->contentType;

        foreach ($reader->getData() as $child) {

            //foreach ($this->contentType->getChild() as $child) {

            //$childContentType = $child->getContentType();
            if ($child->hasView()) {

                //$div = new Div($this);
                //$child->getDefaultView($div);

                $widget = new ContentWidget($this);
                $widget->contentType= $child;
                $widget->addContentAction(new DeleteContentAction());

                $action=new RemoveContentAction();
                $action->treeId = $child->

                $widget->addContentAction()



            }

        }*/



        /*
        foreach ($this->contentType->getChild() as $contentRow) {


            $contentType = $contentRow->getContentType();

            if ($contentType->hasView()) {

                $div = new Div($this);
                if ($contentType->hasView()) {
                    $view = $contentType->getDefaultView($div);
                    //$view->dataId = $contentRow->dataId;
                }

            }

        }*/

        return parent::getContent();

    }

}