<?php

namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Config\ConfigWriter;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Core\Type\File\File;

class ConfigFileBuilder extends AbstractBase
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var bool
     */
    public  $overwriteExistingFile =false;

    public $mySqlHost='localhost';
    public $mySqlPort=3306;
    public $mySqlUser;
    public $mySqlPassword;
    public $mySqlDatabase;
    public $webUrl='/';

    public function writeFile()
    {


            $writer = new ConfigWriter($this->filename);
            $writer->filename = $this->filename;
            $writer->overwriteExistingFile = $this->overwriteExistingFile;
            $writer->add('mysql_host',$this->mySqlHost);
            $writer->add('mysql_port', $this->mySqlPort);
            $writer->add('mysql_user', $this->mySqlUser);
            $writer->add('mysql_password', $this->mySqlPassword);
            $writer->add('mysql_database', $this->mySqlDatabase);
            $writer->add('web_url', $this->webUrl);

            /*$input = new ConsoleInput();
            $input->message = 'Send Mail';
            $input->defaultValue = 'false';
            $writer->add('send_mail', $input->getValue());*/

            /*$input = new ConsoleInput();
            $input->message = 'Smtp Host';
            $writer->add('smtp_host', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Smtp Authentication';
            $input->defaultValue = 'true';
            $writer->add('smtp_authentication', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Smtp User';
            $writer->add('smtp_user', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Smtp Password';
            $writer->add('smtp_password', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Smtp Port';
            $writer->add('smtp_port', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Default Mail Address';
            $writer->add('default_mail_address', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Default Mail Text';
            $writer->add('default_mail_text', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Staging Enviroment';
            $input->defaultValue = 'development';
            $writer->add('staging_enviroment', $input->getValue());*/

            $writer->writeFile();


    }

}