<?php


namespace Nemundo\Content\App\Bookmark\Content;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Heading\H3;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class UrlContentView extends AbstractContentView
{

    /**
     * @var UrlContentType
     */
    public $contentType;

    public function getContent()
    {

        $bookmarkRow = $this->contentType->getDataRow();

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->openNewWindow = true;
        $hyperlink->url = $bookmarkRow->url;

        $h2 = new H3($hyperlink);
        $h2->content = $bookmarkRow->title;

        if ($bookmarkRow->image->hasValue()) {

            $div = new Div($hyperlink);

            $img = new BootstrapResponsiveImage($div);
            $img->src = $bookmarkRow->image->getImageUrl($bookmarkRow->model->imageAutoSize800);

        }

        $p = new Paragraph($this);
        $p->content = $bookmarkRow->description;

        return parent::getContent();

    }

}