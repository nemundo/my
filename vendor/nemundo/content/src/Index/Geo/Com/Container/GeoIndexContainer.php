<?php


namespace Nemundo\Content\Index\Geo\Com\Container;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Index\Geo\Data\Distance\DistanceReader;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Geo\Map\GoogleMaps\GoogleMapsHyperlink;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class GeoIndexContainer extends AbstractContentTypeContainer
{

    public function getContent()
    {

        /** $contentType GeoIndexTrait */
        if ($this->contentType->isObjectOfTrait(GeoIndexTrait::class)) {

            $widget=new AdminWidget($this);
            $widget->widgetTitle='Geo Index';

            $link = new GoogleMapsHyperlink($widget);
            $link->geoCoordinate = $this->contentType->getCoordinate();


            // Distance Table

            $table = new AdminClickableTable($widget);

            $header = new TableHeader($table);
            $header->addText('Place');
            $header->addText('Type');
            $header->addText('Distance');


            $reader = new DistanceReader();
            $reader->model->loadContentTo();
            $reader->model->contentTo->loadContentType();
            $reader->filter->andEqual($reader->model->contentFromId, $this->contentType->getContentId());
            $reader->addOrder($reader->model->distance);
            $reader->limit = 10;

            foreach ($reader->getData() as $distanceRow) {
                $row = new BootstrapClickableTableRow($table);
                $row->addText($distanceRow->contentTo->subject);
                $row->addText($distanceRow->contentTo->contentType->contentType);
                $row->addText($distanceRow->distance . ' m');
                $row->addText((new Number($distanceRow->distance / 1000))->roundNumber(0) . ' km');

                $site = clone($this->redirectSite);
                $site->addParameter(new ContentParameter($distanceRow->contentToId));
                $row->addClickableSite($site);

            }

        }

        return parent::getContent();

    }

}