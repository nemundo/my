<?php


namespace Nemundo\Content\App\Base\Site;


use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Content\App\Camera\Site\CameraSite;
use Nemundo\Content\App\Contact\Site\ContactSite;
use Nemundo\Content\App\Dashboard\Site\UserDashboardSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Favorite\Site\FavoriteSite;
use Nemundo\Content\App\Feed\Site\FeedSite;
use Nemundo\Content\App\File\Site\FileSite;
use Nemundo\Content\App\ImageGallery\Site\ImageGallerySite;
use Nemundo\Content\App\Inbox\Site\InboxSite;
use Nemundo\Content\App\Job\Site\JobSite;
use Nemundo\Content\App\Location\Site\LocationKmlSite;
use Nemundo\Content\App\Map\Site\RouteKmlSite;
use Nemundo\Content\App\Task\Site\TaskSite;
use Nemundo\Content\App\Timeline\Site\TimelineSite;
use Nemundo\Content\App\TimeSeries\Site\TimeSeriesSite;
use Nemundo\Content\App\Video\Site\VideoSite;
use Nemundo\Content\App\Webcam\Site\WebcamSite;
use Nemundo\Content\App\Widget\Site\WidgetSite;
use Nemundo\Content\Index\Geo\Site\GeoIndexSite;
use Nemundo\Web\Site\AbstractSite;

class ContentAppSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Content App';
        $this->url = 'content-app';


        new ExplorerSite($this);
        new UserDashboardSite($this);
        new InboxSite($this);
        //new FavoriteSite($this);
        new CalendarSite($this);
        new TaskSite($this);
        new ContactSite($this);
        new GeoIndexSite($this);
        new TimelineSite($this);



        new JobSite($this);


        new FileSite($this);
        //new VideoSite($this);
        new WebcamSite($this);
        new ContactSite($this);
        new WidgetSite($this);
        //new ImageGallerySite($this);
        new CameraSite($this);
        new LocationKmlSite($this);
        new FeedSite($this);

        new TimeSeriesSite($this);


        new RouteKmlSite($this);

    }


    public function loadContent()
    {

    }


}