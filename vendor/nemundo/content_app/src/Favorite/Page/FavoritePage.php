<?php


namespace Nemundo\Content\App\Favorite\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\App\Favorite\Com\Container\FavoriteContainer;
use Nemundo\Content\App\Favorite\Data\Favorite\FavoritePaginationReader;
use Nemundo\Content\App\Favorite\Parameter\FavoriteParameter;
use Nemundo\Content\App\Favorite\Site\FavoriteSite;
use Nemundo\Content\App\Favorite\Site\UserFavoriteDeleteSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Table\Th;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Session\UserSession;

class FavoritePage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $title = new AdminTitle($this);
        $title->content = FavoriteSite::$site->title;

        $layout = new BootstrapTwoColumnLayout($this);


        $container = new FavoriteContainer($layout->col1);
        $container->redirectSite=FavoriteSite::$site;


        /*
        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);

        $th = new Th($header);
        $th->content[LanguageCode::EN] = 'Subject';
        $th->content[LanguageCode::DE] = 'Betreff';

        $header->addEmpty();

        $favoriteReader = new FavoritePaginationReader();
        $favoriteReader->model->loadContent();
        $favoriteReader->model->content->loadContentType();
        $favoriteReader->filter->andEqual($favoriteReader->model->userId, (new UserSession())->userId);
        $favoriteReader->addOrder($favoriteReader->model->subject);

        foreach ($favoriteReader->getData() as $favoriteRow) {

            $contentType = $favoriteRow->content->getContentType();

            $row = new BootstrapClickableTableRow($table);
            $row->addText($contentType->getSubject());

            $site = clone(UserFavoriteDeleteSite::$site);
            $site->addParameter(new FavoriteParameter($favoriteRow->id));
            $row->addIconSite($site);

            if ($contentType->hasViewSite()) {
                $site = $contentType->getViewSite();
            } else {
                $site = clone(FavoriteSite::$site);
                $site->addParameter(new ContentParameter($favoriteRow->contentId));
            }

            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $favoriteReader;*/


        $contentParameter = new ContentParameter();
        if ($contentParameter->hasValue()) {
            $contentType = $contentParameter->getContentType(false);

            $title = new AdminTitle($layout->col2);
            $title->content = $contentType->getSubject();

            if ($contentType->hasView()) {
                $view = $contentType->getDefaultView($layout->col2);
            }

        }

        return parent::getContent();

    }

}