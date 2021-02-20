<?php


namespace Nemundo\Content\App\Task\Type;


use Nemundo\Content\App\Task\Index\TaskIndexTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;


abstract class AbstractTaskContentType extends AbstractTreeContentType
{

    use TaskIndexTrait;

}