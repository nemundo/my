<?php

namespace Nemundo\Content\Type\Index;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;

// IndexBuilder
abstract class AbstractIndexBuilder extends AbstractBase
{

    /**
     * @var AbstractContentType
     */
    protected $contentType;

    abstract public function buildIndex();

    abstract public function deleteIndex();

    public function __construct(AbstractContentType $contentType)
    {
        $this->contentType = $contentType;
    }

}