<?php

use Nemundo\Blog\Com\Container\BlogItemContainer;
use Nemundo\Blog\Data\Blog\BlogCount;
use Nemundo\Blog\Data\Blog\BlogReader;
use Nemundo\Com\Template\TemplateDocument;
use Nemundo\Web\Site\AbstractWildcardSite;

require '../config.php';



class TestWildcardSite extends AbstractWildcardSite
{





    public function checkWildcardUrl()
    {

        //(new Debug())->write($this->wildcardUrl);

        $value=false;

       // check for wildcard
        if (true) {
            $value=true;
        }

        return $value;


    }


    public function loadContent()
    {

        (new \Nemundo\Core\Debug\Debug())->write('Output for '.$this->wildcardUrl);


    }

}

