<?php

namespace Nemundo\App\System\Com\Table;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Core\System\PhpEnvironment;
use Nemundo\Core\Type\DateTime\DateTime;

class PhpSystemTable extends AdminLabelValueTable
{

    public function getContent()
    {

        $phpEnvironment = new PhpEnvironment();

        $this->addLabelValue('Show Error', $phpEnvironment->getShowError());
        $this->addLabelValue('PHP Version', $phpEnvironment->getPhpVersion());
        $this->addLabelValue('Max File Upload', $phpEnvironment->getMaxFileUpload());
        $this->addLabelValue('Max File Upload Size', $phpEnvironment->getMaxFileUploadSize());
        $this->addLabelValue('Max Post File Size', $phpEnvironment->getMaxPostSize());
        $this->addLabelValue('Memory Limit', $phpEnvironment->getMemoryLimit());
        $this->addLabelValue('Time Limit', $phpEnvironment->getTimeLimit());
        $this->addLabelValue('php.ini Filename', $phpEnvironment->getPhpIniFilename());

        $ul = new UnorderedList();
        foreach ($phpEnvironment->getPhpModul() as $modul) {
            $ul->addText($modul);
        }
        $this->addLabelCom('Php Modul', $ul);

        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}