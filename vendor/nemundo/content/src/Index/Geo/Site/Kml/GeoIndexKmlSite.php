<?php

namespace Nemundo\Content\Index\Geo\Site\Kml;

use Hikefly\App\Hike\Content\Hike\HikeContentType;
use Hikefly\App\Hike\Data\Hike\HikeReader;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlMarker;
use Nemundo\Html\Container\Container;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
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
        foreach ($reader->getData() as $hikeRow) {

            $placemark = new KmlMarker($kml);
            $placemark->label = $hikeRow->content->subject;
            $placemark->coordinate = $hikeRow->coordinate;

            //$description = new Container();

            /*
            $p = new Paragraph($description);
            $p->content = (new Html($hikeRow->description))->getValue();

            $img = new BootstrapResponsiveImage($description);
            $img->src = $hikeRow->image->getImageUrlWithDomain($hikeRow->model->imageAutoSize800);

            $hyperlink = new UrlHyperlink($description);
            $hyperlink->content = 'More';
            $hyperlink->url = (new HikeContentType($hikeRow->id))->getViewSite()->getUrlWithDomain();
*/

            //$placemark->description = $description->getContent()->bodyContent;  // $hyperlink->getBodyContent();

        }

        $kml->render();


    }
}