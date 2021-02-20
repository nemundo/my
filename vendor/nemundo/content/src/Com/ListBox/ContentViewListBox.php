<?php


namespace Nemundo\Content\Com\ListBox;


use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentViewParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;


// ViewListBox
class ContentViewListBox extends BootstrapListBox
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    protected function loadContainer()
    {

        $this->label = 'View';
        $this->name = (new ContentViewParameter())->getParameterName();

        $this->emptyValueAsDefault=false;

    }


    public function getContent()
    {


        /*
       foreach ( $this->contentType->getViewList() as $view) {
           $this->addItem( $view->viewName,$view->viewName);
       }*/



        $reader = new ContentViewReader();
        $reader->filter->andEqual($reader->model->contentTypeId, $this->contentType->typeId);
        $reader->addOrder($reader->model->viewName);
        foreach ($reader->getData() as $viewRow) {
            $this->addItem($viewRow->id, $viewRow->viewName);
        }

        return parent::getContent();

    }

}