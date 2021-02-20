<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Html\Block\Div;
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


        $reader = new ChildContentTypeReader();
        $reader->contentType = $this->contentType;

        foreach ($reader->getData() as $child) {

            //foreach ($this->contentType->getChild() as $child) {

            //$childContentType = $child->getContentType();
            if ($child->hasView()) {
                $div = new Div($this);
                $child->getDefaultView($div);
            }

        }



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