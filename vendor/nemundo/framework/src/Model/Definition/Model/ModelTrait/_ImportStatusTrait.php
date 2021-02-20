<?php

namespace Nemundo\Model\Definition\Model\ModelTrait;


use Nemundo\Model\Definition\Index\ModelIndex;
use Nemundo\Orm\Type\Number\YesNoOrmType;

trait ImportStatusTrait
{

    /**
     * @var YesNoOrmType
     */
    public $importStatus;

    public function loadImportStatus()
    {

        $this->importStatus = new YesNoOrmType($this);
        $this->importStatus->fieldName = 'import_status';
        $this->importStatus->variableName = 'importStatus';
        $this->importStatus->visible->form = false;
        $this->importStatus->visible->table = false;
        $this->importStatus->visible->view = false;

        // index ???

        $index = new ModelIndex($this);
        $index->addType($this->importStatus);


    }


}