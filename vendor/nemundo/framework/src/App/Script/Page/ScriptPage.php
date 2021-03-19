<?php


namespace Nemundo\App\Script\Page;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\App\Script\Data\Script\ScriptReader;
use Nemundo\App\Script\Parameter\ScriptUrlParameter;
use Nemundo\App\Script\Site\ScriptRunSite;
use Nemundo\App\Script\Template\ScriptTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ScriptPage extends ScriptTemplate
{

    public function getContent()
    {

        $search = new SearchForm($this);

        $formRow = new BootstrapRow($search);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->searchMode = true;
        $applicationListBox->column = true;
        $applicationListBox->columnSize = 2;

        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('App');
        $header->addText('Script Name');
        $header->addText('Description');
        $header->addText('ScriptClass');
        $header->addText('Console Script');
        $header->addEmpty();

        $scriptReader = new ScriptReader();
        $scriptReader->model->loadApplication();

        if ($applicationListBox->hasValue()) {
            $scriptReader->filter->andEqual($scriptReader->model->applicationId, $applicationListBox->getValue());
        }

        foreach ($scriptReader->getData() as $scriptRow) {
            $row = new TableRow($table);
            $row->addText($scriptRow->application->application);
            $row->addText($scriptRow->scriptName);
            $row->addText($scriptRow->description);
            $row->addText($scriptRow->scriptClass);
            $row->addYesNo($scriptRow->consoleScript);

            $site = clone(ScriptRunSite::$site);
            $site->addParameter(new ScriptUrlParameter($scriptRow->id));
            $row->addIconSite($site);

        }

        return parent::getContent();
    }

}