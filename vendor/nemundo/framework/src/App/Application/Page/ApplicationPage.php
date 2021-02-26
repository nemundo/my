<?php


namespace Nemundo\App\Application\Page;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Application\Com\ListBox\ProjectListBox;
use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Application\Site\InstallSite;
use Nemundo\App\Application\Site\ReinstallSite;
use Nemundo\App\Application\Site\UninstallSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ApplicationPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $form=new SearchForm($layout->col1);

        $formRow = new BootstrapRow($form);

        $project=new ProjectListBox($formRow);
        $project->submitOnChange=true;
        $project->searchMode=true;
        $project->column=true;
        $project->columnSize=2;


        $table = new AdminTable($layout->col1);

        $applicationReader = new ApplicationReader();
        $applicationReader->model->loadProject();

        if ($project->hasValue()) {
            $applicationReader->filter->andEqual($applicationReader->model->projectId,$project->getValue());
        }


        $applicationReader->addOrder($applicationReader->model->application);

        $header = new TableHeader($table);
        $header->addText($applicationReader->model->project->label);
        $header->addText($applicationReader->model->application->label);
        $header->addText($applicationReader->model->install->label);
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();
        $header->addText('Package');
        $header->addText('Dependency');


        foreach ($applicationReader->getData() as $applicationRow) {

            $row = new TableRow($table);
            $row->addText($applicationRow->project->project);
            $row->addText($applicationRow->application);
            $row->addYesNo($applicationRow->install);

            $app = $applicationRow->getApplication();

            if ($app !== null) {

                if ($app->hasInstall()) {
                    $site = clone(InstallSite::$site);
                    $site->addParameter(new ApplicationParameter($applicationRow->id));
                    $row->addSite($site);
                } else {
                    $row->addEmpty();
                }

                if ($app->hasUninstall()) {
                    $site = clone(UninstallSite::$site);
                    $site->addParameter(new ApplicationParameter($applicationRow->id));
                    $row->addSite($site);
                } else {
                    $row->addEmpty();
                }

                if ($app->hasInstall() && ($app->hasUninstall())) {
                    $site = clone(ReinstallSite::$site);
                    $site->addParameter(new ApplicationParameter($applicationRow->id));
                    $row->addSite($site);

                } else {
                    $row->addEmpty();
                }



                $ul = new UnorderedList($row);
                foreach ($app->getPackageList() as $package) {
                    $ul->addText($package->packageName);
                }



                $row->addText('');



            } else {
                $row->addText('No Class');
            }

        }

        return parent::getContent();

    }

}