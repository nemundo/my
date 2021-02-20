<?php


namespace Nemundo\App\SqLite\Connection;


use Nemundo\App\SqLite\Cookie\FilenameCookie;
use Nemundo\App\SqLite\SqLiteConfig;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;

class FilenameConnection extends SqLiteConnection
{

    protected function loadConnection()
    {

        /*
        $cookie=new FilenameCookie();
        $this->filename = $cookie->getValue(); //  SqLiteConfig::$sqLiteFilename;
*/

        $this->filename = SqLiteConfig::$sqLiteFilename;

    }

}