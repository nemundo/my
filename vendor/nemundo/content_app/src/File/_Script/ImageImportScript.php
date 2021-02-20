<?php

namespace Nemundo\Content\App\File\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\DirectoryReader;

class ImageImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'image-import';
    }

    public function run()
    {

        $path= 'D:\Dropbox\Travel Photo\Europa';

        $input=new ConsoleInput();
        $input->message='Image Path';
        $input->defaultValue=$path;

        $reader = new DirectoryReader();
        $reader->path=$input->getValue();
        foreach ($reader->getData() as $file) {

            (new Debug())->write($file->fullFilename);

            $type=new ImageContentType();
            $type->file->fromFilename($file->fullFilename);
            $type->saveType();


        }



    }
}