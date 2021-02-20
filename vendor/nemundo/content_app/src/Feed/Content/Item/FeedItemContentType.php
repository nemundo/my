<?php


namespace Nemundo\Content\App\Feed\Content\Item;


use Nemundo\Content\App\Timeline\Index\TimelineIndexTrait;
use Nemundo\Content\Index\Calendar\DateTimeIndexTrait;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItem;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemCount;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemDelete;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemId;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemReader;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemRow;
use Nemundo\Content\App\Feed\Parameter\FeedItemParameter;
use Nemundo\Content\App\Feed\Site\FeedItemRedirectSite;
use Nemundo\Content\App\Stream\Index\StreamIndexTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

class FeedItemContentType extends AbstractTreeContentType
{

    //use DateTimeIndexTrait;
    use TimelineIndexTrait;

    public $feedId;

    public $title;

    // text
    public $description;

    public $url;

    /**
     * @var DateTime
     */
    public $feedDateTime;

    public $imageUrl;

    public $audioUrl;

    public $videoUrl;


    // get Feed Item als source in search (aufgabe auch nicht)

    protected function loadContentType()
    {

        $this->typeLabel = 'Feed Item';
        $this->typeId = '7c727c6f-e179-442d-acf6-e5f7c602d1ee';

        $this->formClassList[]=ContentSearchForm::class;

        $this->viewClassList[]  = FeedItemContentView::class;
        $this->viewSite = FeedItemRedirectSite::$site;
        $this->parameterClass = FeedItemParameter::class;

        $this->listingClass=FeedItemContentListing::class;

        $this->feedDateTime= (new DateTime())->setNow();

    }


    protected function onCreate()
    {

        $data = new FeedItem();
        $data->feedId = $this->feedId;
        $data->title = $this->title;
        $data->description = $this->description;
        $data->url = $this->url;
        $data->dateTime=$this->feedDateTime;

        if ($this->imageUrl!==null) {
            $data->hasImage=true;
            $data->imageUrl=$this->imageUrl;
        } else {
            $data->hasImage=false;
        }

        if ($this->audioUrl!==null) {
            $data->hasAudio=true;
            $data->audioUrl=$this->audioUrl;
        } else {
            $data->hasAudio=false;
        }

        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

    }


    protected function onIndex()
    {

        $itemRow = $this->getDataRow();

        $this->addSearchText($itemRow->title);
        $this->addSearchText($itemRow->description);
        $this->saveSearchIndex();

        $this->saveTimeline();

    }


    protected function onDelete()
    {
        (new FeedItemDelete())->deleteById($this->dataId);
        $this->deleteSearchIndex();

    }


    public function existItem()
    {

        $value = true;

        $count = new FeedItemCount();
        $count->filter->andEqual($count->model->url, $this->url);
        if ($count->getCount() === 0) {
            $value = false;
        } else {

            $id = new FeedItemId();
            $id->filter->andEqual($id->model->url, $this->url);
            $this->dataId = $id->getId();

        }

        return $value;

    }


    protected function onDataRow()
    {
        $reader = new FeedItemReader();
        $reader->model->loadFeed();
        $this->dataRow = $reader->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|FeedItemRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }


    public function getText()
    {
        return $this->getDataRow()->description;
    }


    public function getDateTime()
    {
        return $this->getDataRow()->dateTime;
        // TODO: Implement getDateTime() method.
    }


}