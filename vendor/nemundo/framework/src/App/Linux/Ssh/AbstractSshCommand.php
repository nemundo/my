<?php


namespace Nemundo\App\Linux\Ssh;


use Nemundo\App\Linux\Ssh\AbstractSsh;

abstract class AbstractSshCommand extends AbstractSsh
{


    protected function runCommand($command)
    {


        // to do:
        // remove empty command line

        if (!$this->connect()) {
            return;
        }

        $sshCommand = null;
        if (is_array($command)) {
            $sshCommand = implode(';', $command);
        } else {
            $sshCommand = $command;
        }

        $returnValue = $this->ssh->exec($sshCommand);

        return $returnValue;

    }

}