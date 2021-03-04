<?php

namespace Nemundo\Content\Index\Geo\Site\Kml;

use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlMarker;
use Nemundo\Html\Container\Container;
use Nemundo\Package\FontAwesome\Site\AbstractKmlIconSite;

class GeoIndexKmlSite extends AbstractKmlIconSite
{

    /**
     * @var GeoIndexKmlSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Kml';
        $this->url = 'kml';

        GeoIndexKmlSite::$site = $this;

    }

    public function loadContent()
    {

        $kml = new KmlDocument();
        $kml->filename = 'geoindex.kml';

        $reader = new GeoIndexReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();

        $contentParameter = new ContentParameter();
        if ($contentParameter->hasValue()) {
            $reader->filter->andEqual($reader->model->contentId, $contentParameter->getValue());
        }

        foreach ($reader->getData() as $geoIndexRow) {

            $placemark = new KmlMarker($kml);
            $placemark->label = $geoIndexRow->content->subject;
            $placemark->coordinate = $geoIndexRow->coordinate;

            //$description = new Container();

            $view = $geoIndexRow->content->getContentType()->getDefaultView();

            /*
            $p = new Paragraph($description);
            $p->content = (new Html($hikeRow->description))->getValue();

            $img = new BootstrapResponsiveImage($description);
            $img->src = $hikeRow->image->getImageUrlWithDomain($hikeRow->model->imageAutoSize800);

            $hyperlink = new UrlHyperlink($description);
            $hyperlink->content = 'More';
            $hyperlink->url = (new HikeContentType($hikeRow->id))->getViewSite()->getUrlWithDomain();
*/

            $placemark->description = $view->getContent()->bodyContent;  // $hyperlink->getBodyContent();

        }

        $kml->render();


    }
}