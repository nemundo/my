<?php

namespace Nemundo\Content\Index\Tree\Setup;


use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;

class RestrictedContentTypeSetup extends AbstractBase
{

    /**
     * @var AbstractContentType
     */
    private $contentType;

    public function __construct(AbstractContentType $contentType)
    {
        $this->contentType = $contentType;
    }


    public function addRestrictedContentType(AbstractContentType $restrictedContentType)
    {

        $data = new RestrictedContentType();
        $data->ignoreIfExists = true;
        $data->contentTypeId = $this->contentType->typeId;
        $data->restrictedContentTypeId = $restrictedContentType->typeId;
        $data->save();

        return $this;

    }

}