<?php

namespace Nemundo\App\System\Com\Table;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Core\System\PhpEnvironment;
use Nemundo\Core\Type\DateTime\DateTime;

class SystemTable extends AdminLabelValueTable
{

    public function getContent()
    {

        $this->addLabelValue('Sytem Date/Time', (new DateTime())->setNow()->getIsoDateTimeFormat());
        $this->addLabelValue('Timezone', (new PhpEnvironment())->getTimezone());


        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}