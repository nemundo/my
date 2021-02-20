<?php

namespace Nemundo\Content\Index\Tree\Reader;


use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Row\ContentCustomRow;

class ChildContentReader extends AbstractParentChildContentReader
{


    protected function loadData()
    {

        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        $reader->model->loadView();
        $reader->filter->andEqual($reader->model->parentId, $this->contentType->getContentId());
        $reader->addOrder($reader->model->itemOrder);
        foreach ($reader->getData() as $treeRow) {
            //$this->addItem($treeRow->child);
            $this->addItem($treeRow);
        }

    }

}