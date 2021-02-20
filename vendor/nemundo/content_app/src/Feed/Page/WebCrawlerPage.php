<?php

namespace Nemundo\Content\App\Feed\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Feed\Data\WebCrawler\WebCrawlerReader;
use Nemundo\Content\App\Feed\Template\FeedTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class WebCrawlerPage extends FeedTemplate
{
    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);

        $table=new AdminTable($layout->col1);

        $reader=new WebCrawlerReader();
        foreach ($reader->getData() as $crawlerRow) {

            $row=new TableRow($table);
            $row->addText($crawlerRow->phpClass);


        }



        return parent::getContent();
    }
}