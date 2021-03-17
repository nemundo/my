<?php

require __DIR__ . '/../config.php';

$rssUrl = 'https://de.rt.com/feeds/news/';

(new \Nemundo\Content\App\Feed\Application\FeedApplication())->reinstallApp()->setAppMenuActive();
(new \Nemundo\Content\App\Feed\Setup\FeedSetup())->addFeed($rssUrl);
(new \Nemundo\Content\App\Feed\Scheduler\FeedImportScheduler())->run();

