<?php


namespace Nemundo\Content\Collection;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractContentTypeCollection extends AbstractBase
{

    public $label;


    abstract protected function loadCollection();

    /**
     * @var AbstractContentType[]
     */
    private $contentTypeList = [];

    public function __construct()
    {
        $this->loadCollection();
    }


    protected function addContentType(AbstractContentType $contentType)
    {

        // unique object

        $this->contentTypeList[] = $contentType;
        return $this;
    }


    protected function addContentTypeCollection(AbstractContentTypeCollection $contentTypeCollection)
    {

        foreach ($contentTypeCollection->getContentTypeList() as $contentType) {
            $this->addContentType($contentType);
        }

    }


    public function getContentTypeList()
    {
        return $this->contentTypeList;
    }

}