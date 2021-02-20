<?php


namespace Nemundo\App\Application\Page;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Application\Site\InstallSite;
use Nemundo\App\Application\Site\ReinstallSite;
use Nemundo\App\Application\Site\UninstallSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ApplicationPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $table = new AdminTable($layout->col1);

        $reader = new ApplicationReader();
        $reader->addOrder($reader->model->application);

        $header = new TableHeader($table);
        $header->addText($reader->model->application->label);
        $header->addText($reader->model->install->label);
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();

        foreach ($reader->getData() as $applicationRow) {

            $row = new TableRow($table);
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



            } else {
                $row->addText('No Class');
            }

        }

        return parent::getContent();

    }

}