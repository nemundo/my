<?php


namespace Nemundo\Content\App\Bookmark\Content;


use Nemundo\Content\App\Bookmark\Data\Bookmark\Bookmark;
use Nemundo\Content\App\Bookmark\Data\Bookmark\BookmarkReader;
use Nemundo\Content\App\Bookmark\Data\Bookmark\BookmarkRow;
use Nemundo\Content\App\Bookmark\Data\Bookmark\BookmarkUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Crawler\HtmlParser\HtmlParser;
use Nemundo\Crawler\HtmlParser\OpenGraphParser;
use Nemundo\Model\Data\Property\File\FileProperty;

class UrlContentType extends AbstractTreeContentType
{

    public $url;

    public $title;

    public $description;

    /**
     * @var FileProperty
     */
    public $image;

    protected function loadContentType()
    {

        $this->typeLabel = 'Url';
        $this->typeId = '0abbd11d-5321-4eef-a984-0e4061c5738d';

        $this->formClassList[] = UrlContentForm::class;
        $this->formClassList[]=ContentSearchForm::class;
        $this->viewClassList[]  = UrlContentView::class;

        $this->image = new FileProperty();

    }


    protected function onCreate()
    {

        $data = new Bookmark();
        $data->url = $this->url;
        $data->title = $this->title;
        $data->description = $this->description;
        $data->image->fromFileProperty($this->image);
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

        $update = new BookmarkUpdate();
        $update->title = $this->title;
        $update->description = $this->description;
        $update->updateById($this->dataId);

    }


    protected function onIndex()
    {

        $this->addSearchText($this->getDataRow()->title);
        $this->addSearchText($this->getDataRow()->description);

    }


    protected function onDataRow()
    {

        $this->dataRow = (new BookmarkReader())->getRowById($this->dataId);

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|BookmarkRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }


    public function fromUrl($url)
    {

        $this->url = $url;
        $this->title = $url;

        $parser = new OpenGraphParser($url);
        $this->title = $parser->title;
        $this->description = $parser->description;

        if ($parser->hasImage) {
            $this->image->fromUrl($parser->imageUrl);
        }

        if ($this->title == '') {

            $parser = new HtmlParser();
            $parser->fromUrl($url);
            $this->title = $parser->getPageTitle();

            if ($this->description == '') {
                $this->description = $parser->getDescription();
            }

        }

        return $this;

    }

}