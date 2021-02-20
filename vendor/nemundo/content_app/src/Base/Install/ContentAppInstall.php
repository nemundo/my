<?php


namespace Nemundo\Content\App\Base\Install;


use Nemundo\Content\App\Bookmark\Install\BookmarkInstall;
use Nemundo\Content\App\Calendar\Install\CalendarInstall;
use Nemundo\Content\App\Camera\Install\CameraInstall;
use Nemundo\Content\App\Chart\Install\ChartInstall;
use Nemundo\Content\App\Contact\Install\ContactInstall;

use Nemundo\Content\App\Dashboard\Install\DashboardInstall;
use Nemundo\Content\App\Explorer\Install\ExplorerInstall;
use Nemundo\Content\App\Favorite\Install\FavoriteInstall;
use Nemundo\Content\App\Feed\Install\FeedInstall;
use Nemundo\Content\App\Feiertag\Install\FeiertagInstall;
use Nemundo\Content\App\File\Install\FileInstall;
use Nemundo\Content\App\FileTransfer\Install\FileTransferInstall;
use Nemundo\Content\App\ImageGallery\Install\ImageGalleryInstall;
use Nemundo\Content\App\Inbox\Install\InboxInstall;
use Nemundo\Content\App\Job\Install\JobInstall;
use Nemundo\Content\App\Listing\Install\ListingInstall;
use Nemundo\Content\App\Location\Install\LocationInstall;
use Nemundo\Content\App\Log\Install\LogInstall;
use Nemundo\Content\App\Map\Install\MapInstall;
use Nemundo\Content\App\Message\Install\MessageInstall;
use Nemundo\Content\App\Note\Install\NoteInstall;
use Nemundo\Content\App\Notification\Install\NotificationInstall;
use Nemundo\Content\App\Project\Install\ProjectInstall;
use Nemundo\Content\App\Stream\Install\StreamInstall;
use Nemundo\Content\App\Task\Install\TaskInstall;
use Nemundo\Content\App\Team\Install\TeamInstall;
use Nemundo\Content\App\Text\Install\TextInstall;
use Nemundo\Content\App\Timeline\Install\TimelineInstall;
use Nemundo\Content\App\TimeSeries\Install\TimeSeriesInstall;
use Nemundo\Content\App\ToDo\Install\ToDoInstall;
use Nemundo\Content\App\UserProfile\Install\UserProfileInstall;
use Nemundo\Content\App\Video\Install\VideoInstall;
use Nemundo\Content\App\Webcam\Install\WebcamInstall;
use Nemundo\Content\App\WebRadio\Install\WebRadioInstall;
use Nemundo\Content\App\Website\Install\WebsiteInstall;
use Nemundo\Content\App\Widget\Install\WidgetInstall;
use Nemundo\Project\Install\AbstractInstall;


class ContentAppInstall extends AbstractInstall
{

    public function install()
    {


        (new JobInstall())->install();
        (new TimeSeriesInstall())->install();
        //(new ContainerInstall())->install();
        //(new DocumentInstall())->install();
        (new MapInstall())->install();
        (new VideoInstall())->install();
        (new TextInstall())->install();
        (new WebcamInstall())->install();
        (new ExplorerInstall())->install();
        (new ContactInstall())->install();
        (new CalendarInstall())->install();
        (new FileInstall())->install();
        (new ImageGalleryInstall())->install();
        (new CameraInstall())->install();
        (new BookmarkInstall())->install();
        (new LocationInstall())->install();
        (new FeedInstall())->install();
        (new UserProfileInstall())->install();
        (new DashboardInstall())->install();
        (new FavoriteInstall())->install();
        (new StreamInstall())->install();
        (new ListingInstall())->install();
        (new NoteInstall())->install();
        (new InboxInstall())->install();
        //(new LogInstall())->install();
        (new MessageInstall())->install();
        (new MapInstall())->install();
        (new TaskInstall())->install();
        (new ToDoInstall())->install();
        (new ChartInstall())->install();
        (new ProjectInstall())->install();
        (new FeiertagInstall())->install();
        (new TeamInstall())->install();
        (new FileTransferInstall())->install();
        //(new InvitationInstall())->install();
        (new NotificationInstall())->install();
        (new WebsiteInstall())->install();
        (new WidgetInstall())->install();
        (new WebRadioInstall())->install();
        (new TimelineInstall())->install();


    }

}