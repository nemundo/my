<?php

namespace Nemundo\Content\Type\Index;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractContentIndex extends AbstractBase
{

    /**
     * @var AbstractContentType
     */
    protected $contentType;

    abstract public function buildIndex();  //$dataId);


    public function __construct(AbstractContentType $contentType) {
        $this->contentType=$contentType;
    }



}