<?php


namespace Nemundo\Content\Row;

use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Index\Group\Type\GroupIndexTrait;
use Nemundo\Content\Index\Tree\Type\TreeContentType;
use Nemundo\Content\Type\JsonContentTrait;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Content\Data\Content\ContentRow;
use Nemundo\Content\Type\AbstractContentType;


class ContentCustomRow extends ContentRow
{

    public $itemOrder;

    public function getContentType()
    {

        //$className = $this->contentType->phpClass;


        $contentType=$this->contentType->getContentType($this->dataId);

        /*
        $contentType = null;
        if (class_exists($className)) {

            /** @var AbstractContentType|AbstractTreeContentType|GroupIndexTrait|GeoIndexTrait|JsonContentTrait $contentType */
      /*      $contentType = new $className($this->dataId);

        } else {

            (new LogMessage())->writeError('ContentCustomRow. Content Type is not registred. Class: ' . $className.' Content Id: '.$this->id);
            $contentType = new TreeContentType($this->dataId);

        }*/

        return $contentType;

    }

}