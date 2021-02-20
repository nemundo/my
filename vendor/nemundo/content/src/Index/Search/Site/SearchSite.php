<?php


namespace Nemundo\Content\Index\Search\Site;


use Nemundo\Content\Index\Search\Page\SearchPage;
use Nemundo\Content\Index\Search\Site\Json\SearchContentTypeJsonSite;
use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Web\Site\AbstractSite;


class SearchSite extends AbstractSite
{

    /**
     * @var SearchSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title[LanguageCode::EN] = 'Search';
        $this->title[LanguageCode::DE] = 'Suche';
        $this->url = 'search';
        SearchSite::$site = $this;

        new SearchItemSite($this);
        new SearchJsonSite($this);
        new SearchContentTypeJsonSite($this);

    }


    public function loadContent()
    {

        (new SearchPage())->render();


        // auslagern project repo

        /* $page = (new DefaultTemplateFactory())->getDefaultTemplate();

         //new ContentSearchForm($page);

         $queryParameter = (new SearchQueryParameter());

         if ($queryParameter->hasValue()) {

             $searchReader = new SearchItemReader();
             $searchReader->query = $queryParameter->getValue();
             $searchReader->paginationLimit= 30;

             $contentTypeParameter = new ContentTypeParameter();
             $contentTypeParameter->contentTypeCheck=false;
             if ($contentTypeParameter->hasValue()) {
                 $searchReader->addFilterContentType($contentTypeParameter->getContentType());
             }

             $resultText = [];
             $resultText[LanguageCode::EN] = 'Results found';
             $resultText[LanguageCode::DE] = 'Ergebnisse gefunden';


             $searchCount = $searchReader->getTotalCount();

             $p = new Paragraph($page);
             $p->content = $searchCount . ' ' . (new Translation())->getText($resultText);

             $layout = new BootstrapTwoColumnLayout($page);
             $layout->col1->columnWidth = 10;
             $layout->col2->columnWidth = 2;


             $table = new AdminClickableTable($layout->col1);

             $header = new TableHeader($table);

             $th = new Th($header);
             $th->content[LanguageCode::EN] = 'Subject';
             $th->content[LanguageCode::DE] = 'Betreff';

             $th = new Th($header);
             $th->content = 'Text';

             $th = new Th($header);
             $th->content[LanguageCode::EN] = 'Type';
             $th->content[LanguageCode::DE] = 'Typ';

             foreach ($searchReader->getData() as $searchItem) {

                 $row = new BootstrapClickableTableRow($table);

                 $row->addText($searchItem->subject);
                 $row->addText($searchItem->text);
                 $row->addText($searchItem->typeLabel);
                 $row->addClickableSite($searchItem->site);

             }

             $pagination = new BootstrapPagination($layout->col1);
             $pagination->paginationReader = $searchReader;

             $list = new BootstrapHyperlinkList($layout->col2);

             $label = 'Alle Resultate (' . $searchCount . ')';
             if ((new ContentTypeParameter())->notExists()) {
                 $list->addActiveHyperlink($label);
             } else {
                 $site = new Site();
                 $site->title = $label;
                 $site->removeParameter(new ContentTypeParameter());
                 $list->addSite($site);
             }


             foreach ($searchReader->getContentTypeList() as $item) {

                 if ((new ContentTypeParameter())->getValue() == $item->contentTypeId) {

                     $list->addActiveHyperlink($item->contentTypeLabel);

                 } else {

                     $site = clone(SearchSite::$site);
                     $site->addParameter(new SearchQueryParameter());
                     $site->addParameter(new ContentTypeParameter($item->contentTypeId));
                     $site->title = $item->contentTypeLabel;
                     $list->addSite($site);

                 }

             }

         }

         $page->render();*/

    }

}