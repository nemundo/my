<?php

use Nemundo\App\Linux\Ssh\SftpUploadFile;

require __DIR__ . '/../../config.php';


(new \Nemundo\Core\Debug\Debug())->write('asdf');



$conn = new \Nemundo\App\Linux\Ssh\SshConnection();
$conn->host = '52.174.35.89';
$conn->user = 'lang';
$conn->rsaKey = (new \Nemundo\Core\TextFile\Reader\TextFileReader('D:\ssh\paranautik01.pem'))->getText();

$sftp = new SftpUploadFile();
$sftp->connection = $conn;
foreach ($sftp->getFileList('/') as $filename) {

    (new \Nemundo\Core\Debug\Debug())->write($filename);

}







