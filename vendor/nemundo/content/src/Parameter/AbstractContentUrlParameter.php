<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Check\ContentTypeCheckTrait;
use Nemundo\Web\Parameter\AbstractUrlParameter;

abstract class AbstractContentUrlParameter extends AbstractUrlParameter
{

    use ContentTypeCheckTrait;


    // getContent
    public function getContentType($checkContentType = true)
    {

        $contentType = (new ContentBuilder())->getContent($this->getValue());

        if ($checkContentType) {
            $this->checkContentType($contentType);
        }

        return $contentType;

    }

}