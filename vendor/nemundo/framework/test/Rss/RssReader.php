<?php

require __DIR__ . '/../config.php';



// https://www.srf.ch/feed/podcast/sd/cef54868-809e-4c26-80c3-0e6475cd6479.xml
//$reader->feedUrl = 'https://www.spiegel.de/schlagzeilen/index.rss';
//$reader->feedUrl = 'https://www.advance.ch/nc/de/home/rss-feed/?type=100';
// https://feeds.soundcloud.com/users/soundcloud:users:548834769/sounds.rss



$url = 'https://www.srf.ch/feed/podcast/sd/cef54868-809e-4c26-80c3-0e6475cd6479.xml';


$reader = new \Nemundo\Rss\Reader\RssReader();
$reader->feedUrl = $url;
(new \Nemundo\Core\Debug\Debug())->write($reader->getTitle());

foreach ($reader->getData() as $item) {
    (new \Nemundo\Core\Debug\Debug())->write($item->title);
    (new \Nemundo\Core\Debug\Debug())->write($item->description);
    (new \Nemundo\Core\Debug\Debug())->write($item->url);
    (new \Nemundo\Core\Debug\Debug())->write($item->enclosureUrl);
    (new \Nemundo\Core\Debug\Debug())->write($item->enclosureType);

}
