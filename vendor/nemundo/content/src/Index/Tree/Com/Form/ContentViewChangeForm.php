<?php


namespace Nemundo\Content\Index\Tree\Com\Form;


use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Data\Tree\TreeUpdate;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class ContentViewChangeForm extends BootstrapForm
{

    public $treeId;

    /**
     * @var ContentViewListBox
     */
    private $view;

    public function getContent()
    {

        $treeReader = new TreeReader();
        $treeReader->model->loadChild();
        $treeReader->model->child->loadContentType();
        $treeRow = $treeReader->getRowById($this->treeId);

        $this->view = new ContentViewListBox($this);
        $this->view->contentType = $treeRow->child->getContentType();
        $this->view->value = $treeRow->viewId;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $update = new TreeUpdate();
        $update->viewId = $this->view->getValue();
        $update->updateById($this->treeId);

    }

}