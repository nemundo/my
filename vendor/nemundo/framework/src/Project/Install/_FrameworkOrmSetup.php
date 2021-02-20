<?php

namespace Nemundo\Project\Install;


use Nemundo\Admin\AppDesigner\Collection\AppDesignerOrmCollection;
use Nemundo\Admin\SqlAnalyzer\Collection\SqlAnalyzerOrmCollection;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\FrameworkProject;
use Nemundo\Orm\Setup\OrmCollectionSetup;


class FrameworkOrmSetup extends AbstractScript
{

    public function run()
    {

        $setup = new OrmCollectionSetup();
        $setup->project = new FrameworkProject();
        //$setup->addCollection(new AppDesignerOrmCollection());
        $setup->addCollection(new SqlAnalyzerOrmCollection());

    }

}