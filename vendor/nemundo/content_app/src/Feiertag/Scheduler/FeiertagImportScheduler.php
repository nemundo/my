<?php

namespace Nemundo\Content\App\Feiertag\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\Feiertag\Content\Feiertag\FeiertagContentType;
use Nemundo\Core\Csv\Reader\CsvReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\DateTime\Date;

class FeiertagImportScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->consoleScript = true;
        $this->scriptName = 'feiertag-import';

    }

    public function run()
    {


        $reader = new CsvReader();
        $reader->filename='C:\Users\Urs\Downloads\feiertage.csv';

        //(new Debug())->write($reader->getHeader());

        foreach ($reader->getData() as $csvRow) {

/*            'Datum'
            'Feiertag'*/


            $type=new FeiertagContentType();
            $type->datum = (new Date($csvRow->getValue('Datum')));
            $type->feiertag = $csvRow->getValue('Feiertag');
            $type->saveType();



            //(new Debug())->write($csvRow->getValue('Datum'));



        }



    }
}