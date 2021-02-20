<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Form\Item\File\ImageModelFormItem;
use Nemundo\Model\Item\File\ImageModelItem;
use Nemundo\Model\ModelConfig;
use Nemundo\Model\Type\ImageFormat\AbstractModelImageFormat;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;

class ImageType extends FileType
{

    /**
     * @var AbstractModelImageFormat
     */
    public $defaultFormat;

    /**
     * @var AbstractModelImageFormat[]
     */
    private $format = [];


    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->acceptFileType = AcceptFileType::IMAGE;

       /* $this->formTypeClassName = ImageModelFormItem::class;
        $this->viewItemClassName = ImageModelItem::class;
        $this->tableItemClassName = ImageModelItem::class;
*/

    }


    public function addFormat(AbstractModelImageFormat $format)
    {
        $this->format[] = $format;
        return $this;
    }


    /**
     * @return AbstractModelImageFormat[]|FixWidthModelModelImageFormat[]|FixHeightModelImageFormat[]|AutoSizeModelImageFormat[]
     */
    public function getFormatList()
    {
        return $this->format;
    }

}