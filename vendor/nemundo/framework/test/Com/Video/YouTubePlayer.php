<?php

require '../../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();

$youtubeId = (new \Nemundo\Com\Video\YouTube\YouTubeInformation())->getYouTubeIdFromUrl('https://www.youtube.com/watch?v=ontHcjlnn94&t=129s');

$player = new \Nemundo\Com\Video\YouTube\YouTubePlayer($html);
$player->videoId = $youtubeId;

$html->render();
