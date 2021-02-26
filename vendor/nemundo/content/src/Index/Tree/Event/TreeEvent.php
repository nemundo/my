<?php


namespace Nemundo\Content\Index\Tree\Event;


use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Index\Tree\Data\Tree\Tree;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Index\Tree\Builder\TreeBuilder;
use Nemundo\Content\Type\AbstractType;

class TreeEvent extends AbstractContentEvent
{

    public $parentId;

    /**
     * @param AbstractType|AbstractTreeContentType $contentType
     */
    public function onCreate(AbstractType $contentType)
    {


        $builder = new TreeBuilder();
        $builder->parentId = $this->parentId;
        $builder->childId = $contentType->getContentId();
        $builder->write();

    }

}