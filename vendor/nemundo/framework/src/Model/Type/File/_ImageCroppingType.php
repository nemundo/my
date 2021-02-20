<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Model\Form\Item\File\ImageCroppingModelFormItem;
use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Model\Type\Number\NumberType;

class ImageCroppingType extends AbstractComplexType
{

    /**
     * @var ImageType
     */
    public $image;

    /**
     * @var ImageType
     */
    public $imageOrginal;

    /**
     * @var NumberType
     */
    public $x;

    /**
     * @var NumberType
     */
    public $y;

    /**
     * @var NumberType
     */
    public $width;

    /**
     * @var NumberType
     */
    public $height;


    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->fieldMapping = false;

        $this->image = new ImageType();

        $this->addType($this->image);

        $this->imageOrginal = new ImageType();
        $this->addType($this->imageOrginal);

        $this->x = new NumberType();
        $this->addType($this->x);

        $this->y = new NumberType();
        $this->addType($this->y);

        $this->width = new NumberType();
        $this->addType($this->width);

        $this->height = new NumberType();
        $this->addType($this->height);

        $this->formTypeClassName = ImageCroppingModelFormItem::class;
        // $this->tableItemClassName = ImageCroppingModelItem::class;
        // $this->viewItemClassName = ImageCroppingModelItem::class;


    }


    public function createObject()
    {

        $this->image->fieldName = $this->fieldName . '_image';
        $this->addType($this->image);

        $this->imageOrginal->fieldName = $this->fieldName . '_image_orginal';
        $this->addType($this->imageOrginal);

        $this->x->fieldName = $this->fieldName . '_x';
        $this->addType($this->x);

        $this->y->fieldName = $this->fieldName . '_y';
        $this->addType($this->y);

        $this->width->fieldName = $this->fieldName . '_width';
        $this->addType($this->width);

        $this->height->fieldName = $this->fieldName . '_height';
        $this->addType($this->height);

    }

}