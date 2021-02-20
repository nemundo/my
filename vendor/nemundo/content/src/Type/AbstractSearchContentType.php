<?php


namespace Nemundo\Content\Type;


use Nemundo\Content\Index\Search\Type\SearchIndexTrait;


abstract class AbstractSearchContentType extends AbstractContentType
{

    use SearchIndexTrait;
    use JsonContentTrait;

    public function saveType()
    {

        parent::saveType();
        $this->saveSearchIndex();

    }


    public function deleteType()
    {

        parent::deleteType();
        $this->deleteSearchIndex();

    }

}