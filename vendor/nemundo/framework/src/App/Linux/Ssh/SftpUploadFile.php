<?php


namespace Nemundo\App\Linux\Ssh;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Dev\Linux\Ssh\SshConfig;
use phpseclib\Crypt\RSA;
use phpseclib\Net\SFTP;

class SftpUploadFile extends AbstractSsh
{

    public $sourceFilename;

    public $content;

    public $destinationFilename;

    /**
     * @var \Net_SFTP
     */
    private $sftp;


    protected function connect()
    {


//        define('NET_SFTP_LOGGING', SFTP::LOG_COMPLEX);
//        $this->sftp = new SFTP($this->connection->host);

        if (!$this->sftp->isConnected()) {

            define('NET_SFTP_LOGGING', SFTP::LOG_COMPLEX);
            $this->sftp = new SFTP($this->connection->host);


            if ($this->connection == null) {
                $this->connection = SshConfig::$sshConnction;
            }

            if ($this->connection->rsaKey !== null) {

                $rsa = new RSA();
                $rsa->loadKey($this->connection->rsaKey);

                if (!$this->sftp->login($this->connection->user, $rsa)) {
                    (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                    return false;
                }

            } else {

                if (!$this->sftp->login($this->connection->user, $this->connection->password)) {
                    (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                    return false;
                }

            }

        }

    }


    public function getFileList($path)
    {

        $this->connect();

        $list = [];
        foreach ($this->sftp->nlist($path) as $filename) {
            if (($filename !== '.') && ($filename !== '..')) {
                $list[] = $filename;
            }
        }

        return $list;

    }


    public function getTextFileContent($filename)
    {

        $this->connect();
        $content = $this->sftp->get($filename);
        return $content;

    }


    public function deleteFilename($filename)
    {

        $this->connect();
        $this->sftp->delete($filename);

    }


    public function uploadFile()
    {

        $this->checkVariable();

        //$this->checkPropertyOnNull('sourceFilename');
        $this->checkPropertyOnNull('destinationFilename');

        /*if ($this->sourceFilename == null) {
            (new LogMessage())->writeError('Source Filename');
            return false;
        }*/

        $this->connect();
        if ($this->content !== null) {
            $this->sftp->put($this->destinationFilename, $this->content);
        }

        (new Debug())->write($this->sftp->getSFTPLog());


    }


}