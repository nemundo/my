<?php

namespace Nemundo\Content\App\File\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\File\Content\Upload\UploadFile;
use Nemundo\Core\Console\ConsoleInput;

class FileDownloadScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'file-download';
    }

    public function run()
    {

        $input = new ConsoleInput();
        $input->message = 'File Url';
        $url = $input->getValue();

        $upload = new UploadFile();
        $upload->file->fromUrl($url);
        $upload->uploadFile();

    }
}