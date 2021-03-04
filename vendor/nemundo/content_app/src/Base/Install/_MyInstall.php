<?php

namespace Nemundo\Content\App\Base\Install;


use Nemundo\Content\App\Bookmark\Application\BookmarkApplication;
use Nemundo\Content\App\Bookmark\Content\UrlContentType;
use Nemundo\Content\App\Calendar\Application\CalendarApplication;
use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Explorer\Application\ExplorerApplication;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\App\Favorite\Application\FavoriteApplication;
use Nemundo\Content\App\File\Application\FileApplication;
use Nemundo\Content\App\File\Content\File\FileContentType;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\App\PublicShare\Application\PublicShareApplication;
use Nemundo\Content\App\Text\Application\TextApplication;
use Nemundo\Content\App\Text\Content\RichText\RichTextContentType;
use Nemundo\Content\App\Video\Application\VideoApplication;
use Nemundo\Content\App\Video\Content\IframeVideo\IframeVideoContentType;
use Nemundo\Content\App\Video\Content\YouTube\YouTubeContentType;
use Nemundo\Content\App\Webcam\Application\WebcamApplication;
use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Index\Tree\Setup\RestrictedContentTypeSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class MyInstall extends AbstractInstall
{

    public function install()
    {

        (new ContentApplication())->installApp();


        (new ExplorerApplication())->installApp();
        (new WebcamApplication())->installApp();
        (new BookmarkApplication())->installApp();
        (new FileApplication())->installApp();
        (new CalendarApplication())->installApp();
        (new VideoApplication())->installApp();
        (new FileApplication())->installApp();
        (new TextApplication())->installApp();


        (new PublicShareApplication())->installApp();
        (new FavoriteApplication())->installApp();


        (new RestrictedContentTypeSetup(new ContainerContentType()))
            ->addRestrictedContentType(new ContainerContentType())
            ->addRestrictedContentType(new IframeVideoContentType())
            ->addRestrictedContentType(new WebcamContentType())
            ->addRestrictedContentType(new UrlContentType())
            ->addRestrictedContentType(new ImageContentType())
            ->addRestrictedContentType(new FileContentType())
            ->addRestrictedContentType(new RichTextContentType())
            ->addRestrictedContentType(new CalendarContentType())
            ->addRestrictedContentType(new YouTubeContentType())
            ->addRestrictedContentType(new IframeVideoContentType());


    }

}