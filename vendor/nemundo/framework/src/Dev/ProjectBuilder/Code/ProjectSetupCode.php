<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;


class ProjectSetupCode extends AbstractProjectCode
{

    public function createCode()
    {

        $phpClass = new PhpClass();
        $phpClass->path = $this->path;
        $phpClass->namespace = $this->prefixNamespace . '\\Setup';
        $phpClass->className = $this->prefixNamespace . 'Setup';
        $phpClass->extendsFromClass = 'AbstractScript';
        $phpClass->addUseClass('Nemundo\App\Script\Type\AbstractScript');
        $phpClass->addUseClass('Nemundo\Project\Install\ProjectInstall');
        $phpClass->addUseClass('Nemundo\Dev\Script\AdminBuilderScript');
        $phpClass->addUseClass('Nemundo\App\Script\Setup\ScriptSetup');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'run()';
        $function->add('(new ProjectInstall())->install();');
        $function->add('(new ScriptSetup())->addScript(new AdminBuilderScript());');

        $phpClass->saveFile();

    }

}