<?php


namespace Nemundo\Content\App\Favorite\Com\Container;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Favorite\Data\Favorite\FavoritePaginationReader;
use Nemundo\Content\App\Favorite\Site\UserFavoriteDeleteSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Table\Th;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Content\App\Favorite\Data\Favorite\FavoriteReader;
use Nemundo\Content\App\Favorite\Parameter\FavoriteParameter;
use Nemundo\Content\App\Favorite\Site\FavoriteDeleteSite;
use Nemundo\User\Session\UserSession;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;

class FavoriteContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getContent()
    {


        /*
        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Content Type');
        $header->addText('Subject');
        $header->addEmpty();

        // löschen

        $favoriteReader = new FavoriteReader();
        $favoriteReader->model->loadContent();
        $favoriteReader->model->content->loadContentType();
        $favoriteReader->filter->andEqual($favoriteReader->model->userId, (new UserSession())->userId);
        $favoriteReader->addOrder($favoriteReader->model->content->subject);

        foreach ($favoriteReader->getData() as $favoriteRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($favoriteRow->content->contentType->contentType);
            $row->addText($favoriteRow->content->subject);

            $contentType = $favoriteRow->content->contentType->getContentType();

            $site = clone(FavoriteDeleteSite::$site);
            $site->addParameter(new FavoriteParameter($favoriteRow->id));
            $row->addIconSite($site);

            $row->addClickableSite($contentType->getViewSite($favoriteRow->contentId));


        }*/



        $table = new AdminClickableTable($this);

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
                $site = clone($this->redirectSite);
                $site->addParameter(new ContentParameter($favoriteRow->contentId));
            }


            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $favoriteReader;


        return parent::getContent();
    }

}