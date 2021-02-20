<?php


namespace Nemundo\Model\Script;


use Dev\Install\DevInstall;
use Nemundo\Abrechnung\Install\AbrechnungInstall;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Model\Log\SetupLog;
use Nemundo\Model\Type\Complex\AbstractComplexType;

class ModelCheckScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'model-check';
    }


    public function run()
    {

        /*(new ModelCollectionSetup())
            ->addCollection(new DevModelCollection());*/

        (new DevInstall())->install();

        //(new AbrechnungInstall())->install();


        $tableReader = new MySqlTableReader();
        foreach ($tableReader->getData() as $mySqlTable) {

            $found = false;
            foreach (SetupLog::$modelList as $model) {

                if ($model->tableName == $mySqlTable->tableName) {
                    $found = true;

                    $fieldReader = new MySqlTableFieldReader();
                    $fieldReader->tableName = $mySqlTable->tableName;
                    foreach ($fieldReader->getData() as $mySqlField) {

                        $typeFound = false;
                        foreach ($model->getTypeList() as $type) {

                            if ($type->isObjectOfClass(AbstractComplexType::class)) {

                                foreach ($type->getTypeList() as $subType) {
                                    if ($subType->fieldName == $mySqlField->fieldName) {
                                        $typeFound = true;
                                    }
                                }

                            } else {

                                if ($type->fieldName == $mySqlField->fieldName) {
                                    $typeFound = true;
                                }

                            }

                        }

                        if (!$typeFound) {
                            (new Debug())->write('Drop Field: '.$mySqlField->fieldName);
                            $mySqlField->dropField();
                        }

                    }

                }

            }

            if (!$found) {
                (new Debug())->write('Drop Table: '.$mySqlTable->tableName);
                $mySqlTable->dropTable();
            }

        }

    }

}