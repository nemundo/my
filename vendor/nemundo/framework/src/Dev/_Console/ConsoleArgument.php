<?php

namespace Nemundo\Dev\Console;


use Nemundo\Core\Base\AbstractBaseClass;

class ConsoleArgument extends AbstractBaseClass
{

    private $argument;

    public function __construct()
    {

        global $argv;
        $this->argument = $argv;
        //$argument = trim($argv[1]);

    }


    public function getValue($number)
    {

        $value = '';
        if (isset($this->argument[$number])) {
            $value = $this->argument[$number];
        }
        return $value;

    }


}