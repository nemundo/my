<?php


namespace Nemundo\App\Linux\Cmd;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractCmd extends AbstractBase
{

    abstract public function getCmd();

}