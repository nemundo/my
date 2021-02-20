<?php


namespace Nemundo\Content\View;


use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractContentView extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType|AbstractTreeContentType
     */
    public $contentType;

    public $viewName = 'default';


}