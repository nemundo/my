<?php

namespace Nemundo\Content\App\IssueTracker\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\IssueTracker\Application\IssueTrackerApplication;
use Nemundo\Content\App\IssueTracker\Content\Cancel\CancelContentType;
use Nemundo\Content\App\IssueTracker\Content\Issue\IssueProcess;
use Nemundo\Content\App\IssueTracker\Content\IssueTracker\IssueTrackerContentType;
use Nemundo\Content\App\IssueTracker\Content\Priority\PriorityContentType;
use Nemundo\Content\App\IssueTracker\Content\Solved\SolvedContentType;
use Nemundo\Content\App\IssueTracker\Data\IssueTrackerModelCollection;
use Nemundo\Content\App\Task\Application\TaskApplication;
use Nemundo\Content\App\Task\Install\TaskInstall;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class IssueTrackerInstall extends AbstractInstall
{
    public function install()
    {

        (new TaskApplication())->installApp();

        (new ApplicationSetup())
            ->addApplication(new IssueTrackerApplication());

        (new ModelCollectionSetup())
            ->addCollection(new IssueTrackerModelCollection());

        (new ContentTypeSetup(new IssueTrackerApplication()))
            ->addContentType(new IssueTrackerContentType())
            ->addContentType(new PriorityContentType())
            ->addContentType(new IssueProcess())
            ->addContentType(new SolvedContentType())
            ->addContentType(new CancelContentType());


    }
}