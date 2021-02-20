<?php


namespace Nemundo\App\Linux\Cmd;


class RebootCmd extends AbstractCmd
{

    public function getCmd()
    {

        $cmd = 'sudo shutdown -r now';
        return $cmd;

    }

}