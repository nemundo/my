<?php

namespace Nemundo\Package\OpenGraph;

use Nemundo\Html\Header\AbstractHeaderHtmlContainer;


class OpenGraph extends AbstractOpenGraph  // AbstractHeaderHtmlContainer
{

    /**
     * @var string
     */
  //  public $title;

    /**
     * @var string
     */
    //public $siteName;

    /**
     * @var string
     */
    //public $description;

    /**
     * @var string
     */
    //public $imageUrl;


    public function getContent()
    {


        $this->prefix='og';

         $this->addMeta('title', $this->title);
        $this->addMeta('description', $this->description);
        $this->addMeta('image', $this->imageUrl);


        /*
        if ($this->title !== null) {
            $meta = new OpenGraphMeta($this);
            $meta->property = 'og:title';
            $meta->content = $this->title;
        }

        if ($this->siteName !== null) {
            $meta = new OpenGraphMeta($this);
            $meta->property = 'og:site_name';
            $meta->content = $this->siteName;
        }

        if ($this->description !== null) {
            $meta = new OpenGraphMeta($this);
            $meta->property = 'description';
            $meta->content = $this->description;
        }

        if ($this->imageUrl !== null) {
            $meta = new OpenGraphMeta($this);
            $meta->property = 'image';
            $meta->content = $this->imageUrl;
        }
*/
        return parent::getContent();

    }

}