<?php

namespace Nemundo\App\FileLog\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\FileLog\Form\FileLogForm;
use Nemundo\App\FileLog\Site\FileLogDeleteSite;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Core\TextFile\Reader\TextFileReader;

class FileLogPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $btn = new AdminSiteButton($this);
        $btn->site = FileLogDeleteSite::$site;

        $form = new FileLogForm($this);
        $filename = $form->getLogFilename();


        if ($filename !== '') {

            $file = new TextFileReader(LogConfig::$logPath . $filename);

            $table = new AdminTable($this);

            foreach ($file->getData() as $line) {
                $row = new TableRow($table);
                $row->addText($line);
            }

        }




        return parent::getContent();
    }

}