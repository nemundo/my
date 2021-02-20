<?php


namespace Nemundo\App\Linux\_Script;


use Nemundo\App\Linux\Ssh\SshCommand;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Paranautik\Ssh\ParanautikTestSshConnection;

class LinuxIntallationScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'linux-installation';

    }


    public function run()
    {

        $cmd = 'sudo apt update;sudo apt upgrade -y;sudo apt install -y curl apache2 mariadb-server php libapache2-mod-php php-mysql php-xml php-mbstring php-zip php-curl;timedatectl set-timezone Europe/Zurich;sudo a2enmod rewrite;sudo systemctl restart apache2';

        $linux = new SshCommand();
        $linux->connection = new ParanautikTestSshConnection();
        $output = $linux->runCommand($cmd);

        (new Debug())->write($output);


    }

}