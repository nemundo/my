<?php

require __DIR__.'/../../config.php';


$calendar = new \Nemundo\Format\Icalendar\Calendar();
$calendar->dateFrom = (new \Nemundo\Core\Type\DateTime\Date())->setNow();
$calendar->dayEvent=true;
$calendar->label = 'test';

$mail = new \Nemundo\App\Mail\Message\SmtpMailMessage();
//$mail->addTo('urs.lang@schleuniger.com');
$mail->addTo('urs.lang@gmail.com');

$mail->subject = 'kalender';
$mail->text =$calendar->getContent();
$mail->contentType = \Nemundo\Core\Http\Response\ContentType::CALENDAR;
$mail->sendMail();



