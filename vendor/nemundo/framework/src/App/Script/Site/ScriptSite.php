<?php

namespace Nemundo\App\Script\Site;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\App\Script\Data\Script\ScriptReader;
use Nemundo\App\Script\Page\ScriptPage;
use Nemundo\App\Script\Parameter\ScriptUrlParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Web\Site\AbstractSite;

class ScriptSite extends AbstractSite
{

    /**
     * @var ScriptSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Script';
        $this->url = 'script';

        new ScriptRunSite($this);

        ScriptSite::$site=$this;

    }


    public function loadContent()
    {

        (new ScriptPage())->render();


        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $search = new SearchForm($page);

        $formRow = new BootstrapRow($search);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->searchMode=true;


        $table = new AdminTable($page);

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

        $page->render();*/

    }

}