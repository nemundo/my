<?php


namespace Nemundo\App\Composer\Cmd;


use Nemundo\App\Linux\Cmd\AbstractCmd;

class ComposerUpdateCmd extends AbstractCmd
{

    public function getCmd()
    {
        $cmd = 'composer update';
        return $cmd;
    }

}