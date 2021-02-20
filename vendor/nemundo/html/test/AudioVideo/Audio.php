<?php

require '../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();

$video = new \Nemundo\Html\Multimedia\Audio($html);
$video->src = 'https://podcastsource.sf.tv/nps/799921254/1761.32/Die+Geheimnisse+der+Muttermilch/podcast/einstein/2019/03/einstein_20190314_222747_13897596_v_podcast_h264_q30.mp4';

$html->render();
