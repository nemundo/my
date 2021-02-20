<?php

require __DIR__.'/../../config.php';

/*
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('urs.lang@gmail.com')
    ->setPassword('Haldigrat99')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['urs.lang@gmail.com' => 'John Doe'])
    ->setTo(['urs.lang@gmail.com'])
    ->setBody('Here is the message itself')
;

// Send the message
$result = $mailer->send($message);

(new \Nemundo\Core\Debug\Debug())->write($result);*/



use Nemundo\App\Mail\Message\SmtpMailMessage;

$mail = new SmtpMailMessage();
$mail->addTo('urs.lang@gmail.com');
$mail->subject = 'Test Mail';
$mail->text = 'Bla bla bla';
$mail->sendMail();

