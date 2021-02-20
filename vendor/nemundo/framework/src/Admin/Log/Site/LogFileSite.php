<?php

namespace Nemundo\Admin\Log\Site;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Log\Form\LogFileForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

// LogFile
// move nach App
class LogFileSite extends AbstractSite
{

    /**
     * @var LogFileSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Log File';
        $this->url = 'log-file';

        new LogFileDeleteSite($this);

        LogFileSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $form = new LogFileForm($page);
        $filename = $form->getLogFilename();

        if ($filename !== '') {

            $file = new TextFileReader(LogConfig::$logPath . $filename);

            $table = new AdminTable($page);

            foreach ($file->getData() as $line) {
                $row = new TableRow($table);
                $row->addText($line);
            }

        }

        $btn = new AdminSiteButton($page);
        $btn->site = LogFileDeleteSite::$site;

        $page->render();

    }

}