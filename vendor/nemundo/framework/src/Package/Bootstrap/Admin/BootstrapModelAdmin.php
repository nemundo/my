<?php

namespace Nemundo\Package\Bootstrap\Admin;


use Nemundo\Model\Admin\ModelAdmin;
use Nemundo\Package\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;

class BootstrapModelAdmin extends ModelAdmin
{


    public function __construct($parentContainer = null)
    {
        parent::__construct($parentContainer);


        $this->tableClass = BootstrapModelTable::class;
        $this->formClassList[] = BootstrapModelForm::class;

    }


}